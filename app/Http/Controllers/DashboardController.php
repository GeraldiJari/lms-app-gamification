<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $user = auth()->user();


        if($user->role === 'admin' || $user->role === 'guru')
        {
            return redirect('/admin');
        }


        if($user->role === 'student')
        {
            return redirect('/learning');
        }


        abort(403);
    }
}
