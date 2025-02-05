<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AddstudentsController;
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

// Route::get('/addstudent', function () {
//     return "Route is working!";
// });


//admin login
Route::post('/adminlogin', [AdminController::class, 'login_dashboard']);
//admin_dashboard
Route::get('/admin_dashboard', [AdminController::class, 'admin_dashboard']);
//addStudent
Route::get('/addstudent', [AddstudentsController::class, 'addstudent']);
