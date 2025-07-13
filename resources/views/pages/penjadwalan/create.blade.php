@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <a href="{{ route('penjadwalan.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
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
                        <option value="{{ $matkul->id }}">{{ $matkul->kode }} - {{ $matkul->nama }} - {{ $matkul->sks }}
                            sks
                            - semester {{ $matkul->semester }} - {{ $matkul->type }} - {{ $matkul->jam }} jam</option>
                    @endforeach
                </select>
            </div>

            <button class="btn btn-success">Tambah Jadwal</button>
        </form>

        <hr>

        <h5>Jadwal Saat Ini:</h5>
        <ul>
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Mata Kuliah</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($jadwals as $index => $jadwal)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $jadwal->matkul->nama }}</td>
                            <td>
                                <form action="{{ route('penjadwalan.destroy', $jadwal->id) }}" method="POST"
                                    style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center">Tidak ada jadwal yang ditambahkan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </ul>
    </div>
@endsection
