<?php

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
    return view('welcome');
});

Route::get('/dashboard', 'App\Http\Controllers\StudentController@myDashoard')->middleware(['auth'])->name('dashboard');
Route::post('/add-new-student', 'App\Http\Controllers\StudentController@addNew')->middleware(['auth']);

Route::get('/update-student/{id?}', 'App\Http\Controllers\StudentController@updateStudent')->middleware(['auth']);
Route::post('/update-student', 'App\Http\Controllers\StudentController@updateStudentAction')->middleware(['auth']);

Route::get('/delete-student/{id}', 'App\Http\Controllers\StudentController@deleteStudent')->middleware(['auth']);

require __DIR__.'/auth.php';



