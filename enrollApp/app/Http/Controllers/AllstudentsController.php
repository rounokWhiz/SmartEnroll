<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

session_start();


class AllstudentsController extends Controller
{
    public function allstudent()
    {
        $allstudent_info = DB::table('student_tbl')
        ->get();

        $manage_student=view('admin.allstudent')
        ->with('all_student_info',$allstudent_info);

        return view('layout')
        ->with('allstudent',$manage_student);

    }
    //student delete method
    public function studentdelete($student_id){
        DB::table('student_tbl')
        ->where('student_id',$student_id)
        ->delete();

        return Redirect::to('/allstudent'); 
    }
    //student information view

    public function studentview($student_id){
        $student_description_view=DB::table('student_tbl')
        ->select('*')
        ->where('student_id',$student_id)
        ->first();

        $manage_description_student=view('admin.view')
        ->with('student_description_profile',$student_description_view);
        return view('layout')
        ->with('view',$manage_description_student);
    }


    
}
