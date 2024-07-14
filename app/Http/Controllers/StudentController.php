<?php

namespace App\Http\Controllers;
use App\Models\Internships;
use App\Models\Applications;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    public function index()
    {
        return view('student.dashboard');
    }
    public function internships(){
        $internships = Internships::where('status', 'approved')->paginate(10);
        $internships->load('user');
        return view('student.Internships', [
            'internships'=> $internships]);
    }

    public function apply($internshipId)
    {
        $userId = Auth::id();
        $internship = Internships::findOrFail($internshipId);
        return view('student.apply', compact('userId', 'internship'));
    }
    public function show($id)
    {
        $internship = DB::select("
        SELECT *
        FROM internships WHERE id='".$id."'");      
       
       // return view('student.show', compact('internship'));
        if (!empty($internship)) {
            $internship = $internship[0]; // Since DB::select returns an array, we take the first result
            return view('student.show', compact('internship'));
        } else {
            // Handle case where internship is not found, e.g., redirect or show error page
            abort(404); // Or handle as per your application's logic
        }
    }

    public function store(Request $request)
    {
        $request->validate([
        'cover_letter' => 'required|file|mimes:pdf,doc,docx,xls,xlsx,csv|max:2048',
        'resume' => 'required|file|mimes:pdf,doc,docx,xls,xlsx,csv|max:2048',
    ], [
        'cover_letter.required' => 'Please upload a cover letter.',
        'cover_letter.file' => 'The cover letter must be a file.',
        'cover_letter.mimes' => 'The cover letter must be a PDF, DOC, DOCX, XLS, XLSX, or CSV file.',
        'cover_letter.max' => 'The cover letter may not be greater than 2048 kilobytes.',
        'resume.required' => 'Please upload a resume.',
        'resume.file' => 'The resume must be a file.',
        'resume.mimes' => 'The resume must be a PDF, DOC, DOCX, XLS, XLSX, or CSV file.',
        'resume.max' => 'The resume may not be greater than 2048 kilobytes.',
    ]);
        // Retrieve the authenticated user's ID
        $userId = Auth::id();

        // Create a new application record
        $application = new Applications();
        $application->user_id = $userId;
        $application->internship_id = $request->internship_id;


        // Handle file upload for cover letter
        if ($request->hasFile('cover_letter')) {
            $coverLetterPath = $request->file('cover_letter')->store('cover_letters'); // Example storage location
            $application->cover_letter = $coverLetterPath;
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


    public function application_info()
    {
        // Fetch applications using raw query
        $userId = Auth::id();
        $applications = DB::select("
            SELECT applications.*,users.name, internships.company_id,internships.title AS internship_title
            FROM applications
            JOIN internships ON applications.internship_id = internships.id  
            JOIN users ON applications.user_id=users.id WHERE internships.company_id='".$userId."'
        ");

        return view('employer.internships.applications', compact('applications'));
    }

    public function updateStatus(Request $request, $id)
    {
       // Update the status using a raw query
      $st=$request->status;
       
       DB::update("UPDATE applications SET status ='".$st."'  WHERE id ='".$id."'");
        
        // Redirect back with a success message
        return redirect()->route('applications.info');
    }
}
