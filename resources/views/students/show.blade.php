@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detail Mahasiswa</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $student->name }}</h5>
            <p class="card-text"><strong>Email:</strong> {{ $student->email }}</p>
            <p class="card-text"><strong>Alamat:</strong> {{ $student->address }}</p>
            <a href="{{ route('students.index') }}" class="btn btn-secondary">Kembali</a>
            <a href="{{ route('students.edit', $student->id) }}" class="btn btn-warning">Edit</a>
        </div>
    </div>
</div>
@endsection
