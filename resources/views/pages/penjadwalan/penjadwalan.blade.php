@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Penjadwalan Dosen</h1>
        </div>

        <div class="card">
            <div class="card-header">
                <h5>Daftar Dosen</h5>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Nama Dosen</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dosens as $dosen)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $dosen->nama }}
                                </td>
                                <td>
                                    @if ($dosen->jadwalDosen)
                                        <span class="badge bg-success">Sudah Terjadwal</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('penjadwalan.create', $dosen->id) }}"
                                        class="btn btn-primary btn-sm">Tambah Matkul</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
