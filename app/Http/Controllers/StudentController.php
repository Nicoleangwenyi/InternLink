<?php

namespace App\Http\Controllers;
use App\Models\Internships;
use App\Models\Applications;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        return view('student.dashboard');
    }
    public function internships(){
        $internships = Internships::paginate(10);
        return view('student.Internships', [
            'internships'=> $internships]);
    }

    public function apply()
    {
        return view('student.apply');
    }
    public function show(Internships $internships)
    {
        return view('student.show', compact('internships'));
    }

}
