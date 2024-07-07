<?php


namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\User;
use App\Models\Internship;

class InternshipController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.manageInternships');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.internships.create');
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
        $internship = Internship::findOrFail($id);
        return view('admin.internships.show', compact('internship'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $internship = Internship::findOrFail($id);
        return view('admin.internships.edit', compact('internship'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $internship = Internship::findOrFail($id);
        $internship->delete();
        return redirect()->route('admin.manageInternships')->with('status', 'Internship deleted successfully');

    }
}
