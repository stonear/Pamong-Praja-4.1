<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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
        return view('admin.user.index')->with('user', $user);
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
}
