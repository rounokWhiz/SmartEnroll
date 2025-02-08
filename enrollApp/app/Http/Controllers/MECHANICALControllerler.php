<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MECHANICALControllerler extends Controller
{
    public function mechanical()
    {
        $csestudent_info = DB::table('student_tbl')
        ->where(['student_department'=>4])
        ->get();

        $manage_student=view('admin.mechanical')
        ->with('cse_student_info',$csestudent_info);

        return view('layout')
        ->with('mechanical',$manage_student);
    }
}
