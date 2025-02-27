<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class AddstudentsController extends Controller
{
    public function addstudent()
    {
        return view('admin.addstudent');
    }

    //student save part here

    public function savestudent(Request $request)
    {
        $data = [
            'student_name' => $request->student_name,
            'student_roll' => $request->student_roll,
            'student_fathersname' => $request->student_fathersname,
            'student_mothersname' => $request->student_mothersname,
            'student_email' => $request->student_email,
            'student_phone' => $request->student_phone,
            'student_address' => $request->student_address,
            'student_password' => $request->student_password,
            'student_admissionyear' => $request->student_admissionyear,
            'student_department' => $request->student_department
        ];

        $image = $request->file('student_image');

        if ($image) {
            $image_name = Str::random(20);
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'image/';
            $image_url = $upload_path . $image_full_name;

            $success = $image->move($upload_path, $image_full_name);
            if ($success) {
                $data['student_image'] = $image_url;

                DB::table('student_tbl')->insert($data);
                Session::put('exception', 'Student added successfully!');
                return Redirect::to('/addstudent');
            }
        }

        //    $data['image'] = $image_url;
        //  DB::table('student_tbl')->insert($data);
        // Session::put('message', 'Student added successfully!');
        //  return Redirect::to('/addstudent');

        DB::table('student_tbl')->insert($data);
        Session::put('exception', 'Student added successfully!');
        return Redirect::to('/addstudent');
    }

    public function studentprofile()
    {
        return view('student.student_view');
    }
}
