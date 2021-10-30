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
use App\Http\Controllers\CourseController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ServicePaymentController;
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

    return view('welcome');
});

Route::get('/refresh_routes', function () {

    Artisan::call('route:clear');
    Artisan::call('optimize');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/login/admin', [LoginController::class, 'showAdminLoginForm'])->name('admin_login');
Route::get('/login/student', [LoginController::class,'showStudentLoginForm'])->name('student_login');
Route::get('/register/admin', [RegisterController::class,'showAdminRegisterForm'])->name('admin_register');
Route::get('/register/student', [RegisterController::class,'showStudentRegisterForm'])->name('student_register');

Route::post('/login/admin', [LoginController::class,'adminLogin']);
Route::post('/login/student', [LoginController::class,'studentLogin']);
Route::post('/register/admin', [RegisterController::class,'createAdmin']);
Route::post('/register/student', [RegisterController::class,'createStudent']);

Route::view('/index', 'student.index')->name('index');
Route::view('/all_projects', 'student.all_projects')->name('all_projects');
Route::view('/about', 'student.about')->name('about');
Route::view('/contact', 'student.contact')->name('contact');

Route::get('/all_projects', [StudentController::class,'all_projects'])->name('all_projects');
Route::get('/phd_projects', [StudentController::class,'phd_projects'])->name('phd_projects');
Route::get('/master_projects', [StudentController::class,'master_projects'])->name('master_projects');
Route::get('/diploma_projects', [StudentController::class,'diploma_projects'])->name('diploma_projects');
Route::get('/fellowship_projects', [StudentController::class,'fellowship_projects'])->name('fellowship_projects');
Route::get('/project_details/{id}', [StudentController::class,'project_details'])->name('project_details');


Route::group(['middleware' => 'auth:student'], function () {

    Route::view('/student', 'student');
    
    

});

Route::group(['middleware' => 'auth:admin'], function () {
    
    //Route::view('/admin', 'admin');
    // Route::get('/admin', [AdminController::class,'divideAdmins']);
    Route::get('/dashboard', [AdminController::class,'dashboard'])->name('dashboard');

    
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

    Route::group(['prefix'=>'courses','as'=>'courses.'], function(){
        Route::get('/', [CourseController::class,'index'])->name('index');
        Route::post('/add', [CourseController::class,'add'])->name('add');
        Route::post('/edit', [CourseController::class,'edit'])->name('edit');
        Route::post('/delete', [CourseController::class,'delete'])->name('delete');
        Route::post('/mass_edit', [CourseController::class,'mass_edit'])->name('mass_edit');
        Route::get('/details/{id}', [CourseController::class,'details'])->name('details');
    });

    Route::group(['prefix'=>'lessons','as'=>'lessons.'], function(){
        Route::get('/', [LessonController::class,'index'])->name('index');
        Route::post('/add', [LessonController::class,'add'])->name('add');
        Route::post('/edit', [LessonController::class,'edit'])->name('edit');
        Route::post('/delete', [LessonController::class,'delete'])->name('delete');
        Route::post('/mass_edit', [LessonController::class,'mass_edit'])->name('mass_edit');
        Route::get('/details/{id}', [LessonController::class,'details'])->name('details');
        Route::get('/data_to_edit', [LessonController::class,'data_to_edit'])->name('data_to_edit');
    });

    Route::group(['prefix'=>'teachers','as'=>'teachers.'], function(){

        Route::get('/', [TeacherController::class,'index'])->name('index');
        Route::post('/add', [TeacherController::class,'add'])->name('add');
        Route::post('/edit', [TeacherController::class,'edit'])->name('edit');
        Route::post('/delete', [TeacherController::class,'delete'])->name('delete');
        Route::get('/data_to_edit', [TeacherController::class,'data_to_edit'])->name('data_to_edit');
    });

    Route::group(['prefix'=>'students','as'=>'students.'], function(){

        Route::get('/', [StudentController::class,'index'])->name('index');
        Route::post('/add', [StudentController::class,'add'])->name('add');
        Route::post('/edit', [StudentController::class,'edit'])->name('edit');
        Route::post('/delete', [StudentController::class,'delete'])->name('delete');
        Route::get('/data_to_edit', [StudentController::class,'data_to_edit'])->name('data_to_edit');
        
    });

    Route::group(['prefix'=>'services','as'=>'services.'], function(){

        Route::get('/', [ServiceController::class,'index'])->name('index');
        Route::post('/add', [ServiceController::class,'add'])->name('add');
        Route::post('/edit', [ServiceController::class,'edit'])->name('edit');
        Route::post('/delete', [ServiceController::class,'delete'])->name('delete');
        Route::get('/data_to_edit', [ServiceController::class,'data_to_edit'])->name('data_to_edit');
        
    });

    Route::group(['prefix'=>'books','as'=>'books.'], function(){

        Route::get('/', [BookController::class,'index'])->name('index');
        Route::post('/add', [BookController::class,'add'])->name('add');
        Route::post('/edit', [BookController::class,'edit'])->name('edit');
        Route::post('/delete', [BookController::class,'delete'])->name('delete');
        Route::get('/data_to_edit', [BookController::class,'data_to_edit'])->name('data_to_edit');
        
    });

    Route::group(['prefix'=>'service_payments','as'=>'service_payments.'], function(){

        Route::get('/', [ServicePaymentController::class,'index'])->name('index');
        Route::post('/add', [ServicePaymentController::class,'add'])->name('add');
        Route::post('/edit', [ServicePaymentController::class,'edit'])->name('edit');
        Route::post('/delete', [ServicePaymentController::class,'delete'])->name('delete');
        Route::get('/data_to_edit', [ServicePaymentController::class,'data_to_edit'])->name('data_to_edit');
        
    });

});

//Route::get('/details', [ProjectController::class,'details'])->name('details');

Route::get('logout', [LoginController::class,'logout']);

Route::get('/test', [TestController::class,'test']);
