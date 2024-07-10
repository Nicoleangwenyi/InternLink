<?php

namespace App\Http\Controllers;
use App\Models\Internships;
use App\Models\Applications;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class EmployerController extends Controller
{
    public function index()
    {
        $applications = applications::with(['user', 'internship'])->paginate(10);

        return view('employer.dashboard', [
            'applications'=> $applications]);
    }


}
