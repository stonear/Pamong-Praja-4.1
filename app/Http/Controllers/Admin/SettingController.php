<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Event;
use Illuminate\Http\Request;

class SettingController extends Controller
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
    	$events = Event::all();
        return view('admin.setting')->with('events', $events);
    }
    public function store(Request $request)
    {
    	$id = $request->input('events');

    	Event::whereIn('id', $id)
        ->update([
            'active' => true,
        ]);

        Event::whereNotIn('id', $id)
        ->update([
            'active' => false,
        ]);

        return back()
        ->with('success','You have successfully update settings.');
    }
}
