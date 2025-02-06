<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AllstudentsController extends Controller
{
    public function allstudent()
    {
        return view('admin.allstudent');
    }
}
