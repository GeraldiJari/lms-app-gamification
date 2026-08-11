<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Session;
use App\Models\User;
use App\Models\Course;

class SessionController extends Controller
{
    //
    public function show(Course $course, Session $session)
    {

        /** @var User $user */
        $user = auth()->user();
        abort_unless($user->courses()->whereKey($session->course_id)->exists(), 403);

        $session->load([
            'materials',
            'assignments',
            'quizzes',
        ]);

        return view(
        'student.sessions.show',
        compact(
            'course',
            'session'
        )
    );
    }
}
