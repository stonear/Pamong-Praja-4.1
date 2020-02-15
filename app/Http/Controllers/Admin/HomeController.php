<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use App\DataTables\UsersDataTable;

class HomeController extends Controller
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
    public function index(UsersDataTable $dataTable)
    {
        return $dataTable->render('admin.home', [
            'registered' => User::where('status', 'registered')->where('role', 'USER')->count(),
            'unconfirmed' => User::where('status', 'unconfirmed')->where('role', 'USER')->count(),
            'confirmed' => User::where('status', 'confirmed')->where('role', 'USER')->count(),
        ]);
    }
}
