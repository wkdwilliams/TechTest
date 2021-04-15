<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Redirect;
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
    return View::make('home', ['user' => session('user')]);
});

Route::get('/th/member/login',          [LoginController::class, 'login']);
Route::post('/th/member/login/auth',    [LoginController::class, 'authenticate']);
Route::get('/th/member/login/logout',   [LoginController::class, 'logout']);

Route::get('/th/member/register', function(){
    return Redirect::to('/th/member/register/1');
});
Route::get('/th/member/register/1',         [RegisterController::class, 'stepOne']);
Route::post('/th/member/register/2',        [RegisterController::class, 'stepTwo']);
Route::post('/th/member/register/3',        [RegisterController::class, 'stepThree']);
Route::post('/th/member/register/create',   [RegisterController::class, 'create']);
Route::get('/th/member/register/success',   [RegisterController::class, 'success']);
