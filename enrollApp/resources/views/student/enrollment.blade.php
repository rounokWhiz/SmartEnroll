@extends('student_layout')
@section('content')
<div class="container">
    <h2>Enroll in a Course</h2>
    <form action="{{ route('enroll.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="course">Course</label>
            <select name="course" id="course" class="form-control">
                <option value="CSE">CSE</option>
                <option value="EEE">EEE</option>
                <option value="ECE">ECE</option>
                <option value="BBA">BBA</option>
            </select>
        </div>
        <div class="form-group">
            <label for="semester">Semester</label>
            <select name="semester" id="semester" class="form-control">
                @for ($i = 1; $i <= 8; $i++)
                    <option value="Semester {{ $i }}">Semester {{ $i }}</option>
                @endfor
            </select>
        </div>
        <div class="form-group">
            <label for="section">Section</label>
            <select name="section" id="section" class="form-control">
                <option value="A">A</option>
                <option value="B">B</option>
                <option value="C">C</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Enroll</button>
    </form>
</div>
@endsection