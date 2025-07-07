@extends('layouts.app')

@section('content')
    <div class="container mt-4 w-50">
        <h4>Edit Harga Jarak & SKS</h4>

        <form action="{{ route('jaraksks.update', $jaraksks->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="harga_jarak" class="form-label">Harga per 1 Km</label>
                <input type="number" name="harga_jarak" class="form-control" value="{{ $jaraksks->harga_jarak }}" required>
            </div>

            <div class="mb-3">
                <label for="harga_sks" class="form-label">Harga per 1 SKS</label>
                <input type="number" name="harga_sks" class="form-control" value="{{ $jaraksks->harga_sks }}" required>
            </div>

            <button type="submit" class="btn btn-warning">Update</button>
        </form>
    </div>
@endsection
