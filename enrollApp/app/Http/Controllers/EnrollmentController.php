<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Enrollment;
use App\Models\Student;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class EnrollmentController extends Controller
{
    public function index()
    {
        return view('student.enrollment');
    }

    public function store(Request $request)
    {
        $request->validate([
            'course' => 'required',
            'semester' => 'required',
            'section' => 'required',
        ]);

        $student_id = session('student_id');
        $section_count = DB::table('enrollments')
            ->where('section', $request->section)
            ->count();

        if ($section_count >= 20) {
            return redirect()->back()->with('error', 'This section is full.');
        }

        Enrollment::create([
            'student_id' => $student_id,
            'course' => $request->course,
            'semester' => $request->semester,
            'section' => $request->section,
        ]);
        
        Session::flash('exception', 'Enrollment Successful');
        return redirect()->route('student.dashboard')->with('success', 'Enrollment successful.');
    }
}
