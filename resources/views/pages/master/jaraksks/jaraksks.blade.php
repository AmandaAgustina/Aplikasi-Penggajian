@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Pengaturan Harga Jarak dan SKS</h1>
        </div>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <h5>Harga per Jarak dan SKS</h5>
                    @if ($jaraksks->count() == 0)
                        <a href="{{ route('jaraksks.create') }}" class="btn btn-primary">Tambah Data</a>
                    @endif
                </div>
            </div>

            <div class="card-body">
                <table class="table table-bordered">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Harga per 1 Km</th>
                            <th>Harga per 1 SKS</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($jaraksks as $item)
                            <tr>
                                <td>1</td>
                                <td>Rp {{ number_format($item->harga_jarak, 0, ',', '.') }}</td>
                                <td>Rp {{ number_format($item->harga_sks, 0, ',', '.') }}</td>
                                <td>
                                    <a href="{{ route('jaraksks.edit', $item->id) }}"
                                        class="btn btn-warning btn-sm">Edit</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">Belum ada data harga. Silakan tambah terlebih dahulu.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
