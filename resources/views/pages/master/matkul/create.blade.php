@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Tambah Mata Kuliah</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Oops!</strong> Ada kesalahan pada input:<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('matkul.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label>Kode</label>
                <input type="text" name="kode" class="form-control" value="{{ old('kode') }}" required>
            </div>
            <div class="mb-3">
                <label>Nama Mata Kuliah</label>
                <input type="text" name="nama" class="form-control" value="{{ old('nama') }}" required>
            </div>
            <div class="mb-3">
                <label>SKS</label>
                <input type="text" name="sks" class="form-control" value="{{ old('sks') }}" required>
            </div>
            <div class="mb-3">
                <label>Semester</label>
                <input type="text" name="semester" class="form-control" value="{{ old('semester') }}" required>
            </div>
            <div class="mb-3">
                <label>Kelas</label>
                <input type="text" name="kelas" class="form-control" value="{{ old('kelas') }}" required>
            </div>
            <div class="mb-3">
                <label>Type</label>
                <select name="type" class="form-control" required>
                    <option value="">Pilih Type</option>
                    <option value="Teori" {{ old('type') == 'Teori' ? 'selected' : '' }}>Teori</option>
                    <option value="Praktikum" {{ old('type') == 'Praktikum' ? 'selected' : '' }}>Praktikum</option>
                </select>
            </div>
            <div class="mb-3">
                <label>Jam</label>
                <input type="text" name="jam" class="form-control" value="{{ old('jam') }}" required>
            </div>
            <button type="submit" class="btn btn-success">Simpan</button>
            <a href="{{ route('matkul.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
@endsection
