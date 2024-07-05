<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }
    public function manageUsers()
    {
        $users = User::with('role')->get();
        
        return view('admin.manageusers', compact('users'));
    }

      /**
     * Show the form for creating a new resource.
     */
    public function createUser()
{
    $roles = Role::all();
    return view('admin.createuser', compact('roles'));
}

public function storeUser(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8|confirmed',
        'role_id' => 'required|exists:roles,id',
    ]);

    User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'role_id' => $request->role_id,
    ]);

    return redirect()->route('admin.manageUsers')->with('success', 'User created successfully.');
}

public function editUser($id)
{
    $user = User::findOrFail($id);
    $roles = Role::all();
    return view('admin.edituser', compact('user', 'roles'));
}

public function updateUser(Request $request, $id)
{
    $user = User::findOrFail($id);

    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
        'password' => 'nullable|string|min:8|confirmed',
        'role_id' => 'required|exists:roles,id',
    ]);

    $user->update([
        'name' => $request->name,
        'email' => $request->email,
        'password' => $request->password ? Hash::make($request->password) : $user->password,
        'role_id' => $request->role_id,
    ]);

    return redirect()->route('admin.manageUsers')->with('success', 'User updated successfully.');
}

public function deleteUser($id)
{
    $user = User::findOrFail($id);
    $user->delete();

    return redirect()->route('admin.manageUsers')->with('success', 'User deleted successfully.');
}



}
