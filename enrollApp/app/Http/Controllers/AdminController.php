<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

session_start();

class AdminController extends Controller
{
    //admin dashboard
    public function admin_dashboard()
    {

        return view('admin.dashboard');
    }

    // student_dashboard
    public function student_dashboard()
    {

        return view('student.dashboard');
    }

    //viewProfile
    public function viewprofile()
    {
        return view('admin.view');
    }

    //admin_setting
    public function setting()
    {
        return view('admin.setting');
    }

    //student_setting
    public function studentsetting()
    {
        $student_id = Session::get('student_id');
        $student_description_view = DB::table('student_tbl')
            ->select('*')
            ->where('student_id', $student_id)
            ->first();

        $manage_description_student = view('student.student_setting')
            ->with('student_description_profile', $student_description_view);
        return view('student_layout')
            ->with('student_setting', $manage_description_student);
    }

    //logout_part
    public function logout()
    {
        Session::put('admin_name', null);
        Session::put('admin_id', null);
        return Redirect::to('/backend');
    }

    //student_logout
    public function student_logout()
    {
        Session::put('student_name', null);
        Session::put('student_id', null);
        return Redirect::to('/');
    }

    //dashboard for admin
    public function login_dashboard(Request $request)
    {
        $email = $request->admin_email;
        $password = md5($request->admin_password);
        $result = DB::table('admin_tbl')
            ->where('admin_email', $email)
            ->where('admin_password', $password)
            ->first();

        if ($result) {

            Session::put('admin_email', $result->admin_email);
            Session::put('admin_id', $result->admin_id);
            return Redirect::to('/admin_dashboard');
        } else {

            Session::put('exception', 'Email or Password Invalid');
            return Redirect::to('/backend');
        }
    }

    //student_login_dashboard
    public function student_login_dashboard(Request $request)
    {
        $email = $request->student_email;
        $password = ($request->student_password);
        $result = DB::table('student_tbl')
            ->where('student_email', $email)
            ->where('student_password', $password)
            ->first();

        if ($result) {

            Session::put('student_email', $result->student_email);
            Session::put('student_id', $result->student_id);
            return Redirect::to('/student_dashboard');
        } else {

            Session::put('exception', 'Email or Password Invalid');
            return Redirect::to('/');
        }
    }
}