@extends('layouts.app')

@section('content')
    <div class="container mt-4 w-50">
        <h4>Tambah Harga Jarak & SKS</h4>

        <form action="{{ route('jaraksks.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="harga_jarak" class="form-label">Harga per 1 Km</label>
                <input type="number" name="harga_jarak" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="harga_sks_teori" class="form-label">Harga SKS Teori</label>
                <input type="number" name="harga_sks_teori" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="harga_sks_praktik" class="form-label">Harga SKS Praktik</label>
                <input type="number" name="harga_sks_praktik" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection
