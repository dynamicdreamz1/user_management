<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/blank', function () {
    return view('sample.blank');
});

Route::get('login','AuthController@login')->name('login');
Route::post('login','AuthController@loginProcess')->name('login.process');
Route::get('logout','AuthController@logout')->name('logout');
Route::get('forgot_password','AuthController@forgot_password')->name('forgot_password');
Route::post('forgot_password','AuthController@forgot_password_process')->name('forgot_password.process');
Route::get('reset_password/{email}','AuthController@reset_password')->name('reset_password');
Route::post('reset_password','AuthController@reset_password_process')->name('reset_password.process');

Route::get('admin/login','AuthController@adminLogin')->name('admin.login');
Route::post('admin/login','AuthController@adminLoginProcess')->name('admin.login.process');

Route::group([ 'middleware'=> ['auth:admin','prevent-back-history'] ],function(){
    Route::resource('users', 'UsersController');
});

Route::group([ 'middleware'=> ['auth:user','prevent-back-history'] ],function(){
    Route::resource('products', 'ProductsController');
    Route::resource('product_categories', 'ProductCategoriesController');
});
