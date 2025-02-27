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
    public function student_dashboard()
    {

        return view('student.dashboard');
    }
    //viewProfile
    public function viewprofile()
    {
        return view('admin.view');
    }
    //setting
    public function setting()
    {
        return view('admin.setting');
    }

    //logout_part
    public function logout()
    {
        Session::put('admin_name', null);
        Session::put('admin_id', null);
        return Redirect::to('/backend');
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
}
