<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Applications;
use App\Models\User;
use App\Models\Internships;
use Carbon\Carbon;

class StatisticsController extends Controller
{
    public function index()
    {
        // Applicants per month
        $applicants = Applications::selectRaw('YEAR(created_at) as year, MONTH(created_at) as month, COUNT(*) as count')
            ->groupBy('year', 'month')
            ->orderBy('year', 'month')
            ->get();

        // Users per month
        $users = User::selectRaw('YEAR(created_at) as year, MONTH(created_at) as month, COUNT(*) as count')
            ->groupBy('year', 'month')
            ->orderBy('year', 'month')
            ->get();

        // Internships per month
        $internships = Internships::selectRaw('YEAR(created_at) as year, MONTH(created_at) as month, COUNT(*) as count')
            ->groupBy('year', 'month')
            ->orderBy('year', 'month')
            ->get();

        return view('statistics.index', compact('applicants', 'users', 'internships'));
    }
}
