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

        $text = substr(Auth::user()->name, 0, 14);
        imagettftext($jpg_image, 50, 0, 75, 300, $black, $font_path, $text);

        $barcode_image = DNS1D::getBarcodePNG(Auth::user()->UID, 'EAN13', 3, 66, array(0, 0, 0), true);
        $barcode_image = base64_decode($barcode_image);
        $barcode_image = imagecreatefromstring($barcode_image);
        imagecopymerge($jpg_image, $barcode_image, 75, 315, 0, 0, 500, 500, 100);

        imagejpeg($jpg_image);
        imagedestroy($jpg_image);

        exit;
    }
}
