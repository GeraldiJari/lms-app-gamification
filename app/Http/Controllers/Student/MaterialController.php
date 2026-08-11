<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Session;
use App\Models\Material;

class MaterialController extends Controller
{
    //
    public function index(Course $course, Session $session)
    {
        abort_unless(
            $session->course_id === $course->id,
            404
        );

        $session->load('materials');

        return view('student.materials.index', [
            'course' => $course,
            'session' => $session,
        ]);
    }


    public function show(
        Course $course,
        Session $session,
        Material $material
    ) {
        abort_unless(
            $session->course_id === $course->id,
            404
        );

        abort_unless(
            $material->session_id === $session->id,
            404
        );

        return view('student.materials.show', [
            'course' => $course,
            'session' => $session,
            'material' => $material,
        ]);
    }
}