<?php

use App\Http\Controllers\RegisterController;
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
    return redirect('/th');
});

Route::get('/th', function () {
    return View::make('home');
});

Route::get('/th/member/login', function () {
    return View::make('login');
});

Route::get('/th/member/register/1',  [RegisterController::class, 'stepOne']);
Route::post('/th/member/register/2', [RegisterController::class, 'stepTwo']);
Route::post('/th/member/register/3', [RegisterController::class, 'stepThree']);
