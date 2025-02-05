<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

session_start();

class AdminController extends Controller
{
    public function admin_dashboard(){
      
        return view('admin.dashboard');

    
    }
    //logout_part
    public function logout()
    {
        Session::put('admin_name',null);
        Session::put('admin_id',null);
        return Redirect::to('/backend');
    
    }

    public function login_dashboard(Request $request)
    {
        $email=$request->admin_email;
        $password=md5($request->admin_password);
        $result=DB::table('admin_tbl')
        ->where('admin_email',$email)
        ->where('admin_password',$password)
        ->first();

        if($result){

            Session::put('admin_email',$result->admin_email);
            Session::put('admin_id',$result->admin_id);
            return Redirect::to('/admin_dashboard');
        }
        else{

            Session::put('exception','Email or Password Invalid');
            return Redirect::to('/backend');
        }
    }
}
