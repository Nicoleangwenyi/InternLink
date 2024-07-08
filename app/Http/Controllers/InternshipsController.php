<?php

namespace App\Http\Controllers;

use App\Models\Internships;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InternshipsController extends Controller
{
    /**
     * Display a listing of the resource.
     */


     public function  manageInternships(){
        $employerId = Auth::user()->id;
        $internships = Internships::where('company_id', $employerId)->get();

        return view('admin.manageInternships', ['internships' => $internships]);

     }
    public function index()
    {
        $user = Auth::user()->id;
        $internships = Internships::paginate(10);
        return view('employer.internships.index', [
            'internships'=> $internships]

        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $userId = Auth::id();
        return view('employer.internships.create', compact('userId'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'description' => 'required|string',
            'requirements' => 'required|string',
            'application_deadline' => 'required|date',
            'stipend_salary' => 'nullable|string|max:255',
            'contact_information' => 'required|string|max:255',
            'company_overview' => 'nullable|string',
            'benefits' => 'nullable|string',
            'working_hours' => 'required|string|max:255',
            'eligibility_criteria' => 'required|string',
        ]);
        $data = $request->all();
        $data['company_id'] = Auth::id(); // Set the company_id to the logged-in user's ID

        Internships::create($data);


        return redirect()->route('internships.index')->with('status', 'Internship Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Internships $internship)
    {
        $userId = Auth::id();
        return view('employer.internships.show', compact('internship', 'userId'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Internships $internship)
    {
        $userId = Auth::id(); // Retrieve the authenticated user's ID
        return view('employer.internships.edit', compact('internship', 'userId'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Internships $internship)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'description' => 'required|string',
            'requirements' => 'required|string',
            'application_deadline' => 'required|date',
            'stipend_salary' => 'nullable|string|max:255',
            'contact_information' => 'required|string|max:255',
            'company_overview' => 'nullable|string',
            'benefits' => 'nullable|string',
            'working_hours' => 'required|string|max:255',
            'eligibility_criteria' => 'required|string',
        ]);
        $data = $request->all();
        $data['company_id'] = Auth::id(); // Set the company_id to the logged-in user's ID


        $internship->update($data);


        return redirect()->route('internships.index')->with('status', 'Internship Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Internships $internship)
    {
        $internship->delete();
        return redirect()->route('internships.index')->with('status','Internship Deleted Successfully');
    }
}
