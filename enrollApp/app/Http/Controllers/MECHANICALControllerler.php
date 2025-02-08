<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MECHANICALControllerler extends Controller
{
    public function mechanical()
    {
        $mechanicalstudent_info = DB::table('student_tbl')
        ->where(['student_department'=>4])
        ->get();

        $manage_student=view('admin.mechanical')
        ->with('mechanical_student_info',$mechanicalstudent_info);

        return view('layout')
        ->with('mechanical',$manage_student);
    }
}
