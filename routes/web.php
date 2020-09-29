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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'HomeController@landingpage');

Auth::routes();

Route::namespace('Back')
		->prefix('admin')
		->name('back.')
		->middleware(['auth', 'can:admin'])
		->group(function(){
			Route::resource('product', 'ProductController');
			Route::resource('category', 'CategoryController');
			Route::resource('order', 'OrderController');
			Route::resource('review', 'ReviewController');
			Route::resource('user', 'UserController');
		});
		
Route::namespace('Front')
		//->prefix('front')
		->name('front.')
		->group(function(){
			Route::resource('product', 'ProductController')->only(['index', 'show']);
			Route::resource('cart', 'CartController')->middleware('auth', 'can:customer')->only(['index', 'store', 'destroy']);
			Route::resource('order', 'OrderController')->middleware('auth', 'can:customer')->only(['index', 'create', 'store', 'show']);
			Route::resource('review', 'ReviewController')->middleware('auth', 'can:customer')->only(['store']);
		});

