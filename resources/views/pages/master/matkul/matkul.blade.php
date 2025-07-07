@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Mata Kuliah</h1>
        </div>
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <h5>Mata Kuliah</h5>
                    <a href="{{ route('matkul.create') }}"><button class="btn btn-primary">Tambah Data</button></a>
                </div>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <td>No</td>
                            <td>Kode</td>
                            <td>Nama Mata Kuliah</td>
                            <td>SKS</td>
                            <td>Semester</td>
                            <td>Type</td>
                            <td>Jam</td>
                            <td>Aksi</td>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($matkul as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->kode }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->sks }}</td>
                                <td>{{ $item->semester }}</td>
                                <td>{{ $item->type }}</td>
                                <td>{{ $item->jam }}</td>
                                <td>
                                    <form action="{{ route('matkul.destroy', $item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{ route('matkul.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">Tidak ada data mata kuliah</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
