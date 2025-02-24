<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AddstudentsController;
use App\Http\Controllers\AllstudentsController;
use App\Http\Controllers\BBAController;
use App\Http\Controllers\CIVILController;
use App\Http\Controllers\CSEController;
use App\Http\Controllers\EEEController;
use App\Http\Controllers\MECHANICALControllerler;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\TutionController;

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

//logout
Route::get('/logout', [AdminController::class, 'logout']);

Route::get('/', function () {
    return view('student_login');
});
Route::get('/backend', function () {
    return view('admin.admin_login');
});


//admin login
Route::post('/adminlogin', [AdminController::class, 'login_dashboard']);
//admin_dashboard
Route::get('/admin_dashboard', [AdminController::class, 'admin_dashboard']);
//viewProfile
Route::get('/viewprofile', [AdminController::class, 'viewprofile']);
//setting
Route::get('/setting', [AdminController::class, 'setting']);


//addStudent
Route::get('/addstudent', [AddstudentsController::class, 'addstudent']);
//saveStudent
Route::post('/savestudent', [AddstudentsController::class, 'savestudent']);
//deleteStudent
Route::get('/student_delete/{student_id}', [AllstudentsController::class, 'studentdelete']);
Route::get('/student_view/{student_id}', [AllstudentsController::class, 'studentview']);
Route::get('/student_edit/{student_id}', [AllstudentsController::class, 'studentedit']);
Route::post('/update_student/{student_id}', [AllstudentsController::class, 'studentupdate']);




Route::get('/allstudent', [AllstudentsController::class, 'allstudent']);
Route::get('/tutionfee', [TutionController::class, 'tutionfee']);
Route::get('/cse', [CSEController::class, 'cse']);
Route::get('/eee', [EEEController::class, 'eee']);
Route::get('/civil', [CIVILController::class, 'civil']);
Route::get('/bba', [BBAController::class, 'bba']);
Route::get('/mechanical', [MECHANICALControllerler::class, 'mechanical']);
Route::get('/allteacher', [TeacherController::class, 'allteacher']);
Route::get('/addteacher', [TeacherController::class, 'addteacher']);
Route::post('/saveteacher', [TeacherController::class, 'saveteacher']);
