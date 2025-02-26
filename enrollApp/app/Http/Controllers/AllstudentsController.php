<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;



class AllstudentsController extends Controller
{
    public function allstudent()
    {
        $allstudent_info = DB::table('student_tbl')
            ->get();

        $manage_student = view('admin.allstudent')
            ->with('all_student_info', $allstudent_info);

        return view('layout')
            ->with('allstudent', $manage_student);
    }

    //student delete method
    public function studentdelete($student_id)
    {
        DB::table('student_tbl')
            ->where('student_id', $student_id)
            ->delete();

        return Redirect::to('/allstudent');
    }

    //student information view
    public function studentview($student_id)
    {
        $student_description_view = DB::table('student_tbl')
            ->select('*')
            ->where('student_id', $student_id)
            ->first();

        $manage_description_student = view('admin.view')
            ->with('student_description_profile', $student_description_view);
        return view('layout')
            ->with('view', $manage_description_student);
    }

    //student edit method
    public function studentedit($student_id)
    {
        $student_description_view = DB::table('student_tbl')
            ->select('*')
            ->where('student_id', $student_id)
            ->first();

        $manage_description_student = view('admin.student_edit')
            ->with('student_description_profile', $student_description_view);
        return view('layout')
            ->with('student_edit', $manage_description_student);
    }

    //Update Student
    public function studentupdate(Request $request, $student_id)
    {

        // echo "</pre>";
        // print_r($student_id);
        // echo "</pre>";

        $data=array();
        $data['student_name']=$request->student_name;
        $data['student_roll']=$request->student_roll;
        $data['student_fathersname']=$request->student_fathersname;
        $data['student_mothersname']=$request->student_mothersname;
        $data['student_email']=$request->student_email;
        $data['student_phone']=$request->student_phone;
        $data['student_address']=$request->student_address;
        $data['student_password']=$request->student_password;
        $data['student_admissionyear']=$request->student_admissionyear;

        DB::table('student_tbl')
            ->where('student_id', $student_id)
            ->update($data);
        
        Session::put('exception', 'Student Updated Successfully!');
        return Redirect::to('/allstudent');
     
    }
}
