<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentsController extends Controller
{
    public function index()
    {
        $students = Student::all();
        return view('students.index', compact('students'));
    }

    public function create()
    {
        return view('students.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email',
            'nim' => 'required|string|unique:students,nim',
            'major' => 'required|string',
            'birth_date' => 'required|date',
            'gender' => 'required|in:L,P',
        ]);
        try {
            Student::create($validated);
            return redirect()->route('students.index')->with('success', 'Student berhasil ditambahkan!');
        } catch (\Exception $e) {
            return redirect()->route('students.index')->with('error', 'Gagal menambah student!');
        }
    }

    public function show(string $id)
    {
        $student = Student::findOrFail($id);
        return view('students.show', compact('student'));
    }

    public function edit(string $id)
    {
        $student = Student::findOrFail($id);
        return view('students.edit', compact('student'));
    }

    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email,' . $id,
            'nim' => 'required|string|unique:students,nim,' . $id,
            'major' => 'required|string',
            'birth_date' => 'required|date',
            'gender' => 'required|in:L,P',
        ]);
        try {
            $student = Student::findOrFail($id);
            $student->update($validated);
            return redirect()->route('students.index')->with('success', 'Student berhasil diupdate!');
        } catch (\Exception $e) {
            return redirect()->route('students.index')->with('error', 'Gagal memperbarui student!');
        }
    }

    public function destroy(string $id)
    {
        try {
            $student = Student::findOrFail($id);
            $student->delete();
            return redirect()->route('students.index')->with('success', 'Student berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect()->route('students.index')->with('error', 'Gagal menghapus student!');
        }
    }
}
