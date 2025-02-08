<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CIVILController extends Controller
{
    public function civil()
    {
        $csestudent_info = DB::table('student_tbl')
        ->where(['student_department'=>3])
        ->get();

        $manage_student=view('admin.civil')
        ->with('cse_student_info',$csestudent_info);

        return view('layout')
        ->with('civil',$manage_student);
    }
}
