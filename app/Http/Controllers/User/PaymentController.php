<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Auth;

class PaymentController extends Controller
{
	public function index(Request $request)
	{
		$this->validate($request, [
			'payment_proof' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
		]);

		$imageName = time() . '.' . request()->payment_proof->getClientOriginalExtension();
		request()->payment_proof->move(public_path('images'), $imageName);

		$user = User::where('id', Auth::user()->id)
		->update([
            'payment_proof' => $imageName,
            'status' => 'unconfirmed',
        ]);

		return back()
		->with('success','You have successfully upload image.');
	}
	public function ticket(Request $request)
    {
        header('Content-type: image/jpeg');

        $user = User::find(Auth::user()->id);

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
}
