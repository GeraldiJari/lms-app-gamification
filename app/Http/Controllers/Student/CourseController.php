<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;
use App\Models\User;

class CourseController extends Controller
{
    //
    public function index()
    {
        /** @var \App\Models\User $user */
        $user = auth()->user();

        $courses = $user
            ->courses()
            ->withCount('sessions')
            ->get();
        
        return view('student.courses.index', compact('courses'));
    }

    public function show(Course $course)
    {
        
        /** @var User $user */
        $user = auth()->user();

        if (! $user->courses()->whereKey($course->id)->exists()) {
            return redirect()
                ->route('student.courses')
                ->with('error', 'Anda tidak memiliki akses ke course tersebut.');
        }

        $course->load([
            'sessions.materials',
            'sessions.assignments',
            'sessions.quizzes',
        ]);

        return view(
            'student.courses.show',
            compact('course')
        );
    }
}
