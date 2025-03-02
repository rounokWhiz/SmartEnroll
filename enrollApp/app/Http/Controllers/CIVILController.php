<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CIVILController extends Controller
{
    public function civil()
    {
        $civilstudent_info = DB::table('student_tbl')
        ->where(['student_department'=>3])
        ->get();

        $manage_student=view('admin.civil')
        ->with('civil_student_info',$civilstudent_info);

        return view('layout')
        ->with('civil',$manage_student);
    }
}
