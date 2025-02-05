<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MECHANICALControllerler extends Controller
{
    public function mechanical()
    {
        return view('admin.mechanical');
    }
}
