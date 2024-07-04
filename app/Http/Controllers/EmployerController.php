<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmployerController extends Controller
{
    public function index()
    {
        return view('employer.dashboard');
    }

    public function internships(){
        return view('employer.postInternships');
    }
}
