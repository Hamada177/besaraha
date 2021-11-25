<?php

use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MessagesController;


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

Route::get('/', function () { return view('welcome');});

Route::get('/', [App\Http\Controllers\FrontendController::class, 'index'])->name('index');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/contact', [App\Http\Controllers\ContactController::class, 'index'])->name('contact');
Route::post('/contact', [\App\Http\Controllers\ContactController::class,'create'])->name('send_contact');



Route::get('about', function(){return view("pages.about");})->name("about");

Route::get('privacy', function(){return view("pages.privacy");})->name("privacy");

Route::get('w/{username}', [\App\Http\Controllers\SendController::class, 'index']);

Route::view('sarh/','pages.index');

Route::post('{username}', [\App\Http\Controllers\SendController::class, 'store']);


Route::get('upload-photo', function(){return view("pages.upload-photo");})->name("upload-photo");

Route::get('/profile/{id}', [\App\Http\Controllers\ProfileController::class, 'index']);

Route::get('/settings', function(){return view("pages.settings");})->middleware(['auth'])->name("settings");
Route::post('settings/update', [\App\Http\Controllers\SettingsController::class, 'update']);

Route::post('settings/update_password', [\App\Http\Controllers\SettingsController::class, 'update_password'])->name('update_password');


Route::get('/locale/{locale}', [\App\Http\Controllers\FrontendController::class, 'switch']);

// admin route
//Route::view('/admin','admin.index');
//Route::get('/admin', [\App\Http\Controllers\AdminController::class, 'index'])->name('index')->middleware('admin');
Route::get('/admin/users', [\App\Http\Controllers\UsersController::class, 'index'])->name('users')->middleware('admin');
Route::get('admin',[\App\Http\Controllers\AdminController::class, 'index'])->name('admin')->middleware('admin');
Route::post('/users/delete_user', [\App\Http\Controllers\UsersController::class, 'delete_user'])->name('delete_user');
Route::get('/users_update/{id}', [\App\Http\Controllers\UsersController::class, 'update_user']);
Route::post('/users_update/update_form_user', [\App\Http\Controllers\UsersController::class, 'update_form_user']);

Route::get('/msgs/{id}', [\App\Http\Controllers\MessagesController::class, 'admin_msgs'])->middleware('admin');

// end admin route



Route::resource('send','SendController');

Route::resource('messages','MessagesController');


Route::get('/messages', [\App\Http\Controllers\MessagesController::class, 'index']);

Route::post('/message/destroy/', [\App\Http\Controllers\MessagesController::class, 'destroy']);

Route::post('/public/{id}/{status}', [\App\Http\Controllers\MessagesController::class, 'pub']);


Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

