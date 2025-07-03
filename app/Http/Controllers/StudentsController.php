<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Menampilkan daftar siswa
        $students = Student::all();
        return view('students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Menampilkan form tambah siswa
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi dan simpan siswa baru
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email',
            'nim' => 'required|string|unique:students,nim',
            'major' => 'required|string',
            'birth_date' => 'required|date',
            'gender' => 'required|in:L,P',
            'address' => 'nullable|string',
        ]);
        try {
            Student::create($validated);
            return redirect()->route('students.index')->with('success', 'Student berhasil ditambahkan!');
        } catch (\Exception $e) {
            return redirect()->route('students.index')->with('error', 'Gagal menambah student!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Menampilkan detail siswa
        $student = Student::findOrFail($id);
        return view('students.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Menampilkan form edit siswa
        $student = Student::findOrFail($id);
        return view('students.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validasi dan update siswa
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email,' . $id,
            'nim' => 'required|string|unique:students,nim,' . $id,
            'major' => 'required|string',
            'birth_date' => 'required|date',
            'gender' => 'required|in:L,P',
            'address' => 'nullable|string',
        ]);
        try {
            $student = Student::findOrFail($id);
            $student->update($validated);
            return redirect()->route('students.index')->with('success', 'Student berhasil diupdate!');
        } catch (\Exception $e) {
            return redirect()->route('students.index')->with('error', 'Gagal memperbarui student!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Hapus siswa
        try {
            $student = Student::findOrFail($id);
            $student->delete();
            return redirect()->route('students.index')->with('success', 'Student berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect()->route('students.index')->with('error', 'Gagal menghapus student!');
        }
    }
}