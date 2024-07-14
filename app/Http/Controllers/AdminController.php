<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\Applications;
use App\Models\Internships;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display the admin dashboard.
     */public function dashboard()
{
    // Applicants per month
    $applicants = Applications::selectRaw('YEAR(created_at) as year, MONTH(created_at) as month, COUNT(*) as count')
    ->groupBy('year', 'month')
    //->orderBy('year', 'month')
    ->get();

    // Users per month
    $users = User::selectRaw('YEAR(created_at) as year, MONTH(created_at) as month, COUNT(*) as count')
        ->groupBy('year', 'month')
       // ->orderBy('year', 'month')
        ->get();

    // Internships per month
    $internships = Internships::selectRaw('YEAR(created_at) as year, MONTH(created_at) as month, COUNT(*) as count')
        ->groupBy('year', 'month')
        //->orderBy('year', 'month')
        ->get();


    // Fetch necessary data
    $studentCount = Role::where('name', 'Student')->first()->users->count();
    $employerCount = Role::where('name', 'Employer')->first()->users->count();
    $activeUsersCount = User::where('account_status', 'active')->count();
    $inactiveUsersCount = User::where('account_status', 'suspended')->count();

    // Return view with data
    return view('admin.dashboard', [
        'studentCount' => $studentCount,
        'employerCount' => $employerCount,
        'activeUsersCount' => $activeUsersCount,
        'inactiveUsersCount' => $inactiveUsersCount,
         'applicants' => $applicants,
         'users' =>$users,
         'internships' => $internships,
    ]);
}


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::with('role')->paginate(8);

        return view('admin.manageusers', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all(); // Fetch all roles from the database
        return view('admin.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
            'role_id' => 'required|exists:roles,id',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role_id' => $request->role_id,
        ]);

        return redirect()->route('admin.manageUsers')->with('status', 'User Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('admin.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $roles = Role::all(); // Fetch all roles from the database
        return view('admin.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8',
            'role_id' => 'required|exists:roles,id',
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password ? bcrypt($request->password) : $user->password,
            'role_id' => $request->role_id,
        ]);

        return redirect()->route('admin.manageUsers')->with('status', 'User Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.manageUsers')->with('status', 'User Deleted Successfully');
    }

    public function suspend($id)
    {
        $user = User::find($id);
        $user->account_status = 'suspended';
        $user->save();
        
        $users = User::with('role')->paginate(8);
        return view('admin.manageusers', compact('users'));
    }

    public function activate($id)
    {
        $user = User::find($id);
        $user->account_status = 'active';
        $user->save();
        
        $users = User::with('role')->paginate(8);

        return view('admin.manageusers', compact('users'));
       
    }

}
