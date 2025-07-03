@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Siswa</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('students.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nama</label>
            <input type="text" name="name" class="form-control" id="name" value="{{ old('name') }}" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" id="email" value="{{ old('email') }}" required>
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">Alamat</label>
            <textarea name="address" class="form-control" id="address">{{ old('address') }}</textarea>
        </div>
        <div class="mb-3">
            <label for="nim" class="form-label">NIM</label>
            <input type="text" name="nim" class="form-control" id="nim" value="{{ old('nim') }}" required>
        </div>
        <div class="mb-3">
            <label for="major" class="form-label">Jurusan</label>
            <input type="text" name="major" class="form-control" id="major" value="{{ old('major') }}" required>
        </div>
        <div class="mb-3">
            <label for="birth_date" class="form-label">Tanggal Lahir</label>
            <input type="date" name="birth_date" class="form-control" id="birth_date" value="{{ old('birth_date') }}" required>
        </div>
        <div class="mb-3">
            <label for="gender" class="form-label">Jenis Kelamin</label>
            <select name="gender" class="form-control" id="gender" required>
                <option value="">Pilih</option>
                <option value="L" {{ old('gender') == 'L' ? 'selected' : '' }}>Laki-laki</option>
                <option value="P" {{ old('gender') == 'P' ? 'selected' : '' }}>Perempuan</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('students.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection