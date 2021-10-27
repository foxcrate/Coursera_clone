<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\CycleController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SemesterController;
use Illuminate\Support\Facades\Artisan;

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
    //return "Alo";
    return view('welcome');
});

Route::get('/refresh_routes', function () {

    Artisan::call('route:clear');
    Artisan::call('optimize');

    //dd("Routes had refreshed ..");
    //return redirect()->back();


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
        Route::post('/add', [CycleController::class,'add'])->name('add');
        Route::post('/edit', [CycleController::class,'edit'])->name('edit');
        Route::post('/delete', [CycleController::class,'delete'])->name('delete');
    });

    Route::group(['prefix'=>'projects','as'=>'projects.'], function(){
        Route::get('/', [ProjectController::class,'index'])->name('index');
        Route::post('/add', [ProjectController::class,'add'])->name('add');
        Route::post('/edit', [ProjectController::class,'edit'])->name('edit');
        Route::post('/mass_edit', [ProjectController::class,'mass_edit'])->name('mass_edit');
        Route::post('/delete', [ProjectController::class,'delete'])->name('delete');
        Route::get('/details/{id}', [ProjectController::class,'details'])->name('details');
        Route::get('/data_to_edit', [ProjectController::class,'data_to_edit'])->name('data_to_edit');
    });

    Route::group(['prefix'=>'semesters','as'=>'semesters.'], function(){
        Route::get('/', [SemesterController::class,'index'])->name('index');
        Route::post('/add', [SemesterController::class,'add'])->name('add');
        Route::post('/edit', [SemesterController::class,'edit'])->name('edit');
        Route::post('/delete', [SemesterController::class,'delete'])->name('delete');
        Route::post('/mass_edit', [SemesterController::class,'mass_edit'])->name('mass_edit');
        Route::get('/details/{id}', [SemesterController::class,'details'])->name('details');
    });

});

//Route::get('/details', [ProjectController::class,'details'])->name('details');

Route::get('logout', [LoginController::class,'logout']);

Route::get('/test', [TestController::class,'test']);
