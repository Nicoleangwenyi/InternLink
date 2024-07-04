<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Role;

class DashboardController extends Controller
{
    public function index()
    {
        // Get the authenticated user and their role
        $user = Auth::user();
        $role = $user->role->name;


        // Determine which dashboard view to return based on the user's role
        if ($role === 'admin') {
            return redirect()->route('admin.dashboard');

        } elseif ($role === 'student') {
            return redirect()->route('student.dashboard');
            
        } elseif ($role === 'employer') {
            return redirect()->route('employer.dashboard');
        }

        // If no valid role is found,
        return redirect()->route('home');
    }

    public function about()
    {
        return view('aboutUs');
    }

    public function contact()
    {
        return view('contactUs');
    }
}
