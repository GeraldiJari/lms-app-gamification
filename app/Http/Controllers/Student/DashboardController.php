<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index()
    {
        /** @var \App\Models\User $user */
        $user = auth()->user();

        $courses = $user
            ->courses()
            ->with('teacher')
            ->get();


        return view('student.dashboard', compact('courses'));
    }
}
