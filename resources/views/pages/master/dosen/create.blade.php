@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Tambah Data Dosen</h2>

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

        <form action="{{ route('dosen.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label>Nama</label>
                <input type="text" name="nama" class="form-control" value="{{ old('nama') }}" required>
            </div>
            <div class="mb-3">
                <label>NIDN</label>
                <input type="text" name="nidn" class="form-control" value="{{ old('nidn') }}" required>
            </div>
            <div class="mb-3">
                <label>Jarak</label>
                <input type="text" name="jarak" class="form-control" value="{{ old('jarak') }}" required>
            </div>
            <div class="mb-3">
                <label>Jabatan</label>
                <input type="text" name="jabatan" class="form-control" value="{{ old('jabatan') }}" required>
            </div>
            <div class="mb-3">
                <label>Alamat</label>
                <textarea name="alamat" class="form-control">{{ old('alamat') }}</textarea>
            </div>
            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
            </div>
            <div class="mb-3">
                <label>Password</label>
                <input type="password" name="password" class="form-control" value="{{ old('password') }}" required>
            </div>
            <button type="submit" class="btn btn-success">Simpan</button>
            <a href="{{ route('dosen.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
@endsection
