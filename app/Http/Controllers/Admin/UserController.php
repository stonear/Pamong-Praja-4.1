<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Country;
use App\Event;
use App\User;
use App\Mail\Ticket;
use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Milon\Barcode\DNS1D;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    	$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function show(Request $request, $id)
    {
    	$user = User::find($id);
        $countries = Country::orderBy('name', 'asc')->get();
        $events = Event::where('active', true)->get();

        return view('admin.user.index', [
            'user' => $user,
            'countries' => $countries,
            'events' => $events,
        ]);
    }
    public function destroy(Request $request, $id)
    {
        $user = User::where('id', $id)
        ->delete();
        
        return back()
        ->with('success','You have successfully delete user.');
    }
    public function verify(Request $request, $id)
    {
        $user = User::find($id);
        $user->update([
            'status' => 'confirmed',
        ]);

        $ticket = $this->ticketRAW($user);
        Mail::to($user->email)->send(new Ticket($user, $ticket));

        return back()
        ->with('success','You have successfully verify user.');
    }
    public function unverify(Request $request, $id)
    {
        $user = User::where('id', $id)
        ->update([
            'status' => 'unconfirmed',
        ]);
        
        return back()
        ->with('success','You have successfully unverify user.');
    }
    public function reject(Request $request, $id)
    {
        $user = User::where('id', $id)
        ->update([
            'status' => 'rejected',
        ]);
        
        return back()
        ->with('success','You have successfully reject user.');
    }
    public function ticket(Request $request, $id)
    {
        header('Content-type: image/jpeg');

        $user = User::find($id);
        echo $this->ticketRAW($user);

        exit;
    }
    public function ticketPrint(Request $request, $id)
    {
        $user = User::find($id);

        return view('admin.user.ticket', [
            'user' => $user,
        ]);
    }
    public function password(Request $request, $id)
    {
        $this->validate($request, [
            'password' => 'required|string|min:8',
        ]);

        $user = User::where('id', $id)
        ->update([
            'password' => Hash::make($request->password),
        ]);
        
        return redirect()->route('admin.user.show', ['id' => $id])
        ->with('success','You have successfully update password.');
    }
    public function ticketRAW(User $user)
    {
        $jpg_image = imagecreatefrompng(realpath('ticket.png'));
        $black = imagecolorallocate($jpg_image, 0, 0, 0);
        $font_path = realpath('BowlbyOneSC-Regular.ttf');

        $text = substr($user->name, 0, 14);
        imagettftext($jpg_image, 50, 0, 75, 300, $black, $font_path, $text);

        $text = $user->event->name;
        $text2 = 'Ukuran Kaos: ' . $user->t_shirt;
        $font_size = 10;
        $dimensions = imagettfbbox($font_size, 0, $font_path, $text);
        $text_width = abs($dimensions[4] - $dimensions[0]);
        $dimensions2 = imagettfbbox($font_size, 0, $font_path, $text2);
        $text_width2 = abs($dimensions2[4] - $dimensions2[0]);
        $x = imagesx($jpg_image) - max($text_width, $text_width2);
        imagettftext($jpg_image, $font_size, 0, $x - 40, 30, $black, $font_path, $text);
        if($user->t_shirt != '-') imagettftext($jpg_image, $font_size, 0, $x - 40, 45, $black, $font_path, $text2);

        $barcode_image = DNS1D::getBarcodePNG($user->UID, 'EAN13', 3, 66, array(0, 0, 0), true);
        $barcode_image = base64_decode($barcode_image);
        $barcode_image = imagecreatefromstring($barcode_image);
        imagecopymerge($jpg_image, $barcode_image, 75, 315, 0, 0, 500, 500, 100);

        ob_start();
        imagejpeg($jpg_image);
        $contents = ob_get_contents();
        ob_end_clean();
        imagedestroy($jpg_image);

        return $contents;
    }
    public function store(Request $request, $id)
    {
        $user = User::where('id', $id)->first();

        $this->validate($request, [
            'event_id' => ['required', 'numeric'],

            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $user->id],

            'sex' => ['required', 'string', 'max:1'],
            'nationality' => ['required', 'string'],
            'id_type' => ['required', 'string'],
            'id_number' => ['required', 'string'],
            'date_of_birth' => ['required', 'date'],
            'phone' => ['required', 'numeric'],
            'community_name' => ['required', 'string'],
            'community_type' => ['required', 'string'],
            't_shirt' => ['required', 'string'],
        ]);

        $user->update([
            'event_id' => $request->event_id,

            'name' => $request->name,
            'email' => $request->email,

            'sex' => $request->sex,
            'nationality' => $request->nationality,
            'id_type' => $request->id_type,
            'id_number' => $request->id_number,
            'date_of_birth' => $request->date_of_birth,
            'phone' => $request->phone,
            'community_name' => $request->community_name,
            'community_type' => $request->community_type,
            't_shirt' => $request->t_shirt,
        ]);
        
        return redirect()->route('admin.user.show', ['id' => $id])
        ->with('success','You have successfully update user data.');
    }
}
