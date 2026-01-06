<?php
namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    // Display all students
    public function index()
    {
        $students = Student::all();
        return view('students.index', compact('students'));
    }

    // Store a new student
    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required',
            'email' => 'required|email|unique:students',
        ]);

        Student::create($request->only('name','email'));

        return redirect()->back()->with('success', 'Student added successfully');
    }

    // Show form to edit student
    public function edit($id)
    {
        $student = Student::findOrFail($id);
        return view('students.edit', compact('student'));
    }

    // Update student
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'  => 'required',
            'email' => "required|email|unique:students,email,$id",
        ]);

        $student = Student::findOrFail($id);
        $student->update($request->only('name','email'));

        return redirect()->route('students.index')->with('success', 'Student updated successfully');
    }

    // Delete student
    public function destroy($id)
    {
        Student::destroy($id);
        return redirect()->route('students.index')->with('success', 'Student deleted successfully');
    }
}
