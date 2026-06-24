<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    //
    public function index()
    {
        /** @var \App\Models\User $user */
        $user = auth()->user();

        $courses = $user
            ->courses()
            ->with('sessions')
            ->get();
        
        return view('student.courses.index', compact('courses'));
    }
}
