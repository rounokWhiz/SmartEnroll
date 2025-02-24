<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
