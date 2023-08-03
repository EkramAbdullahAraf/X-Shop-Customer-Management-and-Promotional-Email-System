<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::apiResource('customers', 'CustomerController');
Route::middleware('auth:api')->group(function () {
    Route::post('campaign', [CampaignController::class, 'sendMail']);
});
Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', 'App\Http\Controllers\Auth\LoginController@login');
    Route::post('logout', 'App\Http\Controllers\Auth\LoginController@logout');
    Route::post('refresh', 'App\Http\Controllers\Auth\LoginController@refresh');

});
