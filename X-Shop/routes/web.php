<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', function () {
    return 'Welcome to the homepage!'; // Replace with your desired view or functionality
})->middleware('auth');
Route::get('/signup', 'App\Http\Controllers\Auth\RegisterController@showRegistrationForm')->name('signup');
Route::get('campaigns/create', 'CampaignController@create');
Route::post('campaigns', 'CampaignController@store');
