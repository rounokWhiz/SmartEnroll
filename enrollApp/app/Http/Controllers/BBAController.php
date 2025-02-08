<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BBAController extends Controller
{
    public function bba()
    {
        $csestudent_info = DB::table('student_tbl')
        ->where(['student_department'=>5])
        ->get();

        $manage_student=view('admin.bba')
        ->with('cse_student_info',$csestudent_info);

        return view('layout')
        ->with('bba',$manage_student);
    }
}
