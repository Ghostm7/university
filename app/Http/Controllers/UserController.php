<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student; // Assuming your model is named Student

class UserController extends Controller
{
    public function index()
    {
        // Retrieve all students from the database
        $students = Student::all();
        
        // Return view with the list of students
        return view('students.index', compact('students'));
    }

    public function create()
    {
        // Return the view for creating a new student
        return view('students.create');
    }

    public function store(Request $request)
    {
        // Validate user input
        $validatedData = $request->validate([
            'name' => 'required',
            'address' => 'required',
            'mobile' => 'required',
        ]);

        // Create new student
        $student = Student::create($validatedData);

        // Redirect to student index page with a success message
        return redirect()->route('students.index')->with('success', 'Student created successfully!');
    }

    public function edit($id)
    {
        // Retrieve the student record to be edited
        $student = Student::findOrFail($id);

        // Return the view for editing the student
        return view('students.edit', compact('student'));
    }

    public function update(Request $request, $id)
    {
        // Validate user input
        $validatedData = $request->validate([
            'name' => 'required',
            'address' => 'required',
            'mobile' => 'required',
        ]);

        // Find the student record to be updated
        $student = Student::findOrFail($id);

        // Update the student record
        $student->update($validatedData);

        // Redirect to student index page with a success message
        return redirect()->route('students.index')->with('success', 'Student updated successfully!');
    }

    public function destroy($id)
    {
        // Find the student record to be deleted
        $student = Student::findOrFail($id);

        // Delete the student record
        $student->delete();

        // Redirect to student index page with a success message
        return redirect()->route('students.index')->with('success', 'Student deleted successfully!');
    }

    public function show($id)
    {
        // Retrieve the student record to be viewed
        $student = Student::findOrFail($id);

        // Return the view for viewing the student
        return view('students.show', compact('student'));
    }
}
