<?php

use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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

// Route::get();
// Route::post();
// Route::put();
// Route::patch();
// Route::delete();
// Route::options();

// Route::get('/users', [UserController::class, 'index'])->name('login');

// Route::get('/user/{id}', [UserController::class, 'show']);

// Route::get('/students', [StudentController::class, 'index']);

// Route::get('/student/{id}', [StudentController::class, 'show']);


//Common routes naming
//index - Show all data or students
//show a single data or student
//create - show a form to a new user
//store - Store a data 
//edit - Show form to edit a data
//update - update a data
//destroy - delete a data

Route::controller(UserController::class)->group(function(){
   Route::get('/register', 'register');
   Route::get('/login', 'login')->name('login')->middleware('guest');
   Route::post('/login/process', 'process');
   Route::post('/logout', 'logout');
   Route::post('/store', 'store');
});


// Route::get('/', [StudentController::class, 'index'])->middleware('auth');

Route::controller(StudentController::class)->group(function(){
   Route::get('/', 'index')->middleware('auth');
   Route::get('/add/student', 'create')->name('add student'); //Addstudent
   Route::post('/add/student', 'store');
   Route::get('/student/{id}', 'show');
   Route::put('/student/{student}', 'update');
   Route::delete('/student/{student}', 'destroy');
});


