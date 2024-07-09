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
        $internships->load('user');
        return view('student.Internships', [
            'internships'=> $internships]);
    }

    public function apply()
    {
        $userId = Auth::id();
        return view('student.apply', compact('userId'));
    }
    public function show(Internships $internship)
    {
        // Pass the internship data to the view
        //Log::info('Showing internship details:', ['internship' => $internship]);

        return view('student.show', compact('internship'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'cover_letter' =>  'required|file|mimes:pdf,doc,docx|max:2048',
            'resume' => 'required|file|mimes:pdf,doc,docx|max:2048', // Example validation for resume file
        ]);

        // Retrieve the authenticated user's ID
        $userId = Auth::id();

        // Create a new application record
        $application = new Applications();
        $application->user_id = $userId;
        $application->application_id = $request->application_id; // Assuming this is set in your form or passed somehow



        // Handle file upload for cover letter
        if ($request->hasFile('cover_letter')) {
            $resumePath = $request->file('cover_letter')->store('cover_letters'); // Example storage location
            $application->resume = $resumePath;
        }


        // Handle file upload for resume
        if ($request->hasFile('resume')) {
            $resumePath = $request->file('resume')->store('resumes'); // Example storage location
            $application->resume = $resumePath;
        }

        // Save the application
        $application->save();

        return redirect()->route('internships')->with('status', 'Application Submitted Successfully');
    }


}
