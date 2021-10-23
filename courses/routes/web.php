<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\CycleController;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/login/admin', [LoginController::class, 'showAdminLoginForm']);
Route::get('/login/student', [LoginController::class,'showStudentLoginForm']);
Route::get('/register/admin', [RegisterController::class,'showAdminRegisterForm']);
Route::get('/register/student', [RegisterController::class,'showStudentRegisterForm']);

Route::post('/login/admin', [LoginController::class,'adminLogin']);
Route::post('/login/student', [LoginController::class,'studentLogin']);
Route::post('/register/admin', [RegisterController::class,'createAdmin']);
Route::post('/register/student', [RegisterController::class,'createStudent']);

Route::group(['middleware' => 'auth:student'], function () {
    Route::view('/student', 'student');
});

Route::group(['middleware' => 'auth:admin'], function () {
    
    //Route::view('/admin', 'admin');
    Route::get('/admin', [AdminController::class,'divideAdmins']);

    Route::group(['prefix'=>'cycles','as'=>'cycles.'], function(){
        Route::get('/', [CycleController::class,'index'])->name('index');
        Route::get('connect', 'AccountController@connect')->name('connect');
    });

});

Route::get('logout', [LoginController::class,'logout']);

Route::get('/test', [TestController::class,'test']);
