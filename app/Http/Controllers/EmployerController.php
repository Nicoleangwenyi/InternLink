<?php

namespace App\Http\Controllers;
use App\Models\Internships;
use App\Models\Applications;
use App\Models\Users;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class EmployerController extends Controller
{
    public function index()
    {
        $applications = applications::with(['user', 'internship'])->paginate(10);

        return view('employer.dashboard', [
            'applications'=> $applications]);
    }
    

    public function applications()
    {
        $applications = DB::table('applications')
            ->join('internships', 'applications.internship_id', '=', 'internships.id')
            ->join('users', 'applications.user_id', '=', 'users.id')
            ->select('applications.*', 'users.name as applicant_name','internships.created_at', 'internships.title as internship_title', 'applications.status')
            ->get();

        return view('employer.internships.applications', compact('applications'));
    }

    public function updateStatus(Request $request, $id)
    {
        DB::table('applications')
            ->where('id', $id)
            ->update(['status' => $request->status]);

        return redirect()->route('applications.index')->with('success', 'Application status updated successfully.');
    }

}
