<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("students.index", [
            "students" => Student::all()
        ]);
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
        $validated = $request->validate([
            "nis" => ["required"],
            "name" => ["required"],
            "email" => ["required"],
            "phone" => ["required"],
        ]);

        Student::create($validated);

        session()->flash('success', 'Berhasil menambahkan data student');

        return to_route('students.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        
        return view("students.edit", [
            "student" => $student
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $student)
    {
        $validated = $request->validate([
            "nis" => ["required"],
            "name" => ["required"],
            "email" => ["required"],
            "phone" => ["required"],
        ]);

        $student = Student::find($student);

        $student->update($validated);

        session()->flash('success', 'Berhasil memperbarui data student');

        return to_route('students.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $student)
    {
        $studentDelete = Student::find($student);

        $studentDelete->delete();

        session()->flash('danger', 'Berhasil menghapus student');

        return to_route('students.index');
    }
}
