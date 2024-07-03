<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProfileRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProfileRequest $request, User $user)
    {
        try {
            // Validate incoming request data
            $validatedData = $request->validated();

            // Prepare data for update
            $updateData = [
                'Fname' => $validatedData['Fname'],
                'email' => $validatedData['email'],
            ];

            // Update user with validated data
            $user->update($updateData);

            // Update password if provided
            if (!empty($validatedData['password'])) {
                $user->password = bcrypt($validatedData['password']);
                $user->save();
            }


            // Redirect to users index with a success message
            $userRole = Auth::user()->role_id; // Adjust this line to match your user role retrieval logic

            switch ($userRole) {
                case '3':
                    return redirect()->route('employer.profile')->with('success', 'Employer details updated successfully.');
                case '2':
                    return redirect()->route('student.profile')->with('success', 'Studentdetails updated successfully.');
                case '1':
                    return redirect()->route('admin.profile')->with('success', 'Admin credentials updated successfully.');
                default:
                    return redirect()->route('home')->with('success', 'User details updated successfully.');
            }

        } catch (\Exception $e) {
            // Handle any errors that may occur
            return redirect()->back()->withErrors(['error' => 'An error occurred while updating your profile.'])->withInput();
        }
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
