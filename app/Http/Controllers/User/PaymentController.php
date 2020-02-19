<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Auth;
use Milon\Barcode\DNS1D;

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

        imagejpeg($jpg_image);
        imagedestroy($jpg_image);

        exit;
    }
}
