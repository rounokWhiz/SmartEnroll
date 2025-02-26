<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class TeacherController extends Controller
{
    public function allteacher()
    {
        return view('admin.allteacher');
    }

    public function addteacher()
    {
        return view('admin.add_teacher');
    }

    // add teacher part

    public function saveteacher(Request $request)
    {
        $data = [
            'teachers_name' => $request->teachers_name,
            'teachers_phone' => $request->teachers_phone,
            'teachers_address' => $request->teachers_address,
            'teachers_department' => $request->teachers_department,
            'teachers_image' => 'default.jpg'
        ];

        $image = $request->file('teachers_image');

        if ($image) {
            $image_name = Str::random(20);
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'image/';
            $image_url = $upload_path . $image_full_name;

            $success = $image->move($upload_path, $image_full_name);
            if ($success) {
                $data['teachers_image'] = $image_url;

                DB::table('teachers_tbl')->insert($data);
                Session::put('exception', 'Teacher added successfully!');
                return Redirect::to('/addteacher');
            }
        }

        //    $data['image'] = $image_url;
        //  DB::table('student_tbl')->insert($data);
        // Session::put('message', 'Student added successfully!');
        //  return Redirect::to('/addstudent');

        DB::table('teachers_tbl')->insert($data);
        Session::flash('exception', 'Teacher added successfully!');
        return Redirect::to('/addteacher');
    }
}
