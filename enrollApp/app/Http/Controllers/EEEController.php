<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EEEController extends Controller
{
    public function eee()
    {
        $csestudent_info = DB::table('student_tbl')
        ->where(['student_department'=>2])
        ->get();

        $manage_student=view('admin.eee')
        ->with('cse_student_info',$csestudent_info);

        return view('layout')
        ->with('eee',$manage_student);
    }
}
