<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Auth;
use Illuminate\Support\Facades\Hash;
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
        $user = User::where('id', $id)
        ->update([
            'status' => 'confirmed',
        ]);
        
        return back()
        ->with('success','You have successfully verify user.');
    }
    public function ticket(Request $request, $id)
    {
        header('Content-type: image/jpeg');

        $user = User::find($id);

        $jpg_image = imagecreatefrompng(realpath('ticket.png'));
        $black = imagecolorallocate($jpg_image, 0, 0, 0);
        $font_path = realpath('BowlbyOneSC-Regular.ttf');

        $text = substr($user->name, 0, 14);
        imagettftext($jpg_image, 50, 0, 75, 300, $black, $font_path, $text);

        $barcode_image = DNS1D::getBarcodePNG($user->UID, 'EAN13', 3, 66, array(0, 0, 0), true);
        $barcode_image = base64_decode($barcode_image);
        $barcode_image = imagecreatefromstring($barcode_image);
        imagecopymerge($jpg_image, $barcode_image, 75, 315, 0, 0, 500, 500, 100);

        imagejpeg($jpg_image);
        imagedestroy($jpg_image);

        exit;
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
}
