<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Auth;
use Illuminate\Support\Facades\Hash;

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

        $text = $user->UID;
        imagettftext($jpg_image, 20, 0, 75, 250, $black, $font_path, $text);

        $text = $user->name;
        imagettftext($jpg_image, 35, 0, 75, 300, $black, $font_path, $text);

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
