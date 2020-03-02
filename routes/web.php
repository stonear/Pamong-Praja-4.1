<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('home', function () {
    return redirect()->route('user.home');
})->name('home');

Auth::routes(['reset' => false]);

Route::middleware(['is_user'])->group(function () {
	Route::get('user', 'User\HomeController@index')->name('user.home');
	Route::post('user/payment', 'User\PaymentController@index')->name('user.payment');
	Route::get('user/ticket', 'User\PaymentController@ticket')->name('user.ticket');
});

Route::middleware(['is_admin'])->group(function () { 
	Route::get('admin/home', 'Admin\HomeController@index')->name('admin.home');
	Route::get('admin/user/{id}', 'Admin\UserController@show')->name('admin.user.show');
	Route::get('admin/user/{id}/destroy', 'Admin\UserController@destroy')->name('admin.user.destroy');
	Route::get('admin/user/{id}/verify', 'Admin\UserController@verify')->name('admin.user.verify');
	Route::get('admin/user/{id}/reject', 'Admin\UserController@reject')->name('admin.user.reject');
	Route::get('admin/user/{id}/unverify', 'Admin\UserController@unverify')->name('admin.user.unverify');
	Route::get('admin/user/{id}/ticket', 'Admin\UserController@ticket')->name('admin.user.ticket');
	Route::post('admin/user/{id}/password', 'Admin\UserController@password')->name('admin.user.password');
	Route::get('admin/barcode', 'Admin\BarcodeController@index')->name('admin.barcode');
	Route::get('admin/barcode/{UID?}', 'Admin\BarcodeController@search')->name('admin.barcode.search');
	Route::get('admin/setting', 'Admin\SettingController@index')->name('admin.setting');
	Route::post('admin/setting', 'Admin\SettingController@store')->name('admin.setting.store');
});