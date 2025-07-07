@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Tambah Data Item Gaji</h2>

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

        <form action="{{ route('tunjangan.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label>Nama</label>
                <input type="text" name="nama" class="form-control" value="{{ old('nama') }}" required>
            </div>
            <div class="mb-3">
                <label>Nominal</label>
                <input type="text" name="nominal" class="form-control" value="{{ old('nominal') }}" required>
            </div>
            <button type="submit" class="btn btn-success">Simpan</button>
            <a href="{{ route('tunjangan.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
@endsection
