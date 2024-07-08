<?php

namespace App\Http\Controllers;
use App\Models\Internships;
use App\Models\Applications;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    public function show(Internships $internship)
    {
        $userId = Auth::id();
        return view('student.show', compact('internship', 'userId'));
    }

}
