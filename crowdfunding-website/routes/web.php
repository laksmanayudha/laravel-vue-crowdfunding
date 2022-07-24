<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

// Route::get('/route-1', function(){
//     return 'masuk ke route 1, email sudah di verifikasi';
// })->middleware(['auth', 'email_verified']);

// Route::middleware(['auth', 'email_verified', 'is_admin'])->group(function(){
//     Route::get('/route-2', function(){
//         return 'masuk ke route 2, halaman khusus admin';
//     });
// });

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

// Route::get('/test', function(){
//     return view('send_mail_user_registered');
// });


// Route::get('/', function(){
//     return view('app');
// });

// Route::get('/{any?}', function(){
//     return 'masuk ke sini';
// })->where('any', '.*');

Route::view('/{any?}', 'app')->where('any', '.*');
