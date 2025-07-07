@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Edit Data Dosen</h2>

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

        <form action="{{ route('dosen.update', $dosen->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label>Nama</label>
                <input type="text" name="nama" class="form-control" value="{{ old('nama', $dosen->nama) }}" required>
            </div>
            <div class="mb-3">
                <label>NIDN</label>
                <input type="text" name="nidn" class="form-control" value="{{ old('nidn', $dosen->nidn) }}" required>
            </div>
            <div class="mb-3">
                <label>Jarak</label>
                <input type="text" name="jarak" class="form-control" value="{{ old('jarak', $dosen->jarak) }}"
                    required>
            </div>
            <div class="mb-3">
                <label>Jabatan</label>
                <input type="text" name="jabatan" class="form-control" value="{{ old('jabatan', $dosen->jabatan) }}"
                    required>
            </div>
            <div class="mb-3">
                <label>Alamat</label>
                <textarea name="alamat" class="form-control">{{ old('alamat', $dosen->alamat) }}</textarea>
            </div>
            <button type="submit" class="btn btn-success">Simpan</button>
            <a href="{{ route('dosen.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
@endsection
