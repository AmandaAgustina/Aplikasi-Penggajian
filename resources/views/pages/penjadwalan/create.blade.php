@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="h3 mb-4">Penjadwalan untuk: {{ $dosen->nama }}</h1>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('penjadwalan.store') }}" method="POST">
            @csrf
            <input type="hidden" name="dosen_id" value="{{ $dosen->id }}">

            <div class="mb-3">
                <label for="matkul_id" class="form-label">Pilih Mata Kuliah</label>
                <select name="matkul_id" id="matkul_id" class="form-control" required>
                    <option value="">-- Pilih --</option>
                    @foreach ($matkuls as $matkul)
                        <option value="{{ $matkul->id }}">{{ $matkul->nama }}</option>
                    @endforeach
                </select>
            </div>

            <button class="btn btn-success">Tambah Jadwal</button>
        </form>

        <hr>

        <h5>Jadwal Saat Ini:</h5>
        <ul>
            @forelse ($jadwals as $jadwal)
                <li>{{ $jadwal->matkul->nama }}</li>
            @empty
                <p>Belum ada jadwal.</p>
            @endforelse
        </ul>
    </div>
@endsection
