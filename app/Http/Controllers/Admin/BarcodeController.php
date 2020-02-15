<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class BarcodeController extends Controller
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
    public function index(Request $request)
    {
        return view('admin.barcode.index');
    }
    public function search(Request $request, $UID)
    {
    	$user = User::find($UID);
    	if($user and $user->role != 'ADMIN')
    	{
    		$result = '';
    		$result .= 'Nama: ' . $user->name . PHP_EOL;
    		$result .= 'Email: ' . $user->email . PHP_EOL;
    		$result .= 'Kategori: ' . $user->event->name . PHP_EOL;
    		$result .= 'Status: ' . $user->status . PHP_EOL;

    		return htmlentities($result);
    	}
    	else
    	{
    		return 'Data tidak ditemukan';
    	}
    }
}
