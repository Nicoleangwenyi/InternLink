<?php

namespace App\Http\Controllers;

use App\Models\Internships;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class InternshipsController extends Controller
{


    public function student_applications()
    {
        // Fetch applications using raw query
        $userId = Auth::id();
        $applications = DB::select("
            SELECT applications.*,users.*, internships.title AS internship_title
            FROM applications
            JOIN internships ON applications.internship_id = internships.id  
            JOIN users ON applications.user_id=users.id
        ");

        return view('student.myapplications', compact('applications'));
    }
    /**
     * Display a listing of the resource.
     */
    public function  manageInternships(){
       // $employerId = Auth::user()->id;
        //$internships = Internships::where('company_id', $employerId)->get();
        //$internships=Internships::all();
        $internships = Internships::with('User')->get();

        

    // Perform the raw SQL query
   /* $internships = DB::select('SELECT internships.*, users.* 
                           FROM internships 
                           LEFT JOIN users ON internships.user_id = users.id');*/
        return view('admin.manageInternships', ['internships' => $internships]);

     }

    public function index()
    {
        $companyId = Auth::id();
        $internships = Internships::where('company_id', $companyId)->paginate(10);

        return view('employer.internships.index', [
            'internships'=> $internships]

        );
    }

    public function updateStatus(Request $request, $id)
    {
        // Validate the incoming request
        $request->validate([
            'status' => 'required|in:pending,approved',
        ]);

        // Find the internship by ID
        $internship = Internships::findOrFail($id);

        // Update the status
        $internship->status = $request->status;
        $internship->save();

        // Redirect back with a success message
        return redirect()->route('admin.manageInternships')->with('success', 'Internship status updated successfully.');
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



    //functions handling the admin functionality
    public function edit_admin(Internships $internship)
    {
        $userId = Auth::id(); // Retrieve the authenticated user's ID
        return view('admin.internships.edit', compact('internship', 'userId'));
    }

    /**
     * Update the nernship data by the admin
     */
    public function update_admin(Request $request, Internships $internship)
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
        //$data['company_id'] = Auth::id(); // Set the company_id to the logged-in user's ID

        $internship->update($data);

        return redirect()->route('admin.manageInternships')->with('success', 'Internship status updated successfully.');
    }

    /**
     * deletion of an internship by the administrator
     */
    public function destroy_admin(Internships $internship)
    {
        $internship->delete();
        return redirect()->route('admin.manageInternships')->with('success', 'Internship deleted successfully.');
    }
}
