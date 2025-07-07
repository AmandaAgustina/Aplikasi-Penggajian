@extends('layouts.app')

@section('content')
    <div class="container">
        <h4 class="mb-4">Absensi Dosen</h4>

        <form action="{{ route('absensi.import') }}" method="POST" enctype="multipart/form-data" class="mb-3">
            @csrf
            <div class="d-flex gap-2 align-items-center">
                <input type="file" name="file" class="form-control w-auto" required>
                <button type="submit" class="btn btn-success">Import Excel</button>
            </div>
        </form>

        <div class="table-responsive">
            <table class="table table-bordered table-sm text-center">
                <thead class="table-primary align-middle">
                    <tr>
                        <th rowspan="2">No</th>
                        <th rowspan="2">NIDN</th>
                        <th rowspan="2">Nama</th>
                        <th rowspan="2">Jabatan</th>
                        <th rowspan="2">Mata Kuliah</th>
                        <th colspan="32">Tanggal</th>
                        <th rowspan="2">Jumlah Kehadiran</th>
                        <th rowspan="2">Jumlah SKS</th>
                        <th rowspan="2">Honor/SKS</th>
                        <th rowspan="2">Total Honor</th>
                    </tr>
                    <tr>
                        @for ($i = 1; $i <= 32; $i++)
                            <th>{{ $i }}</th>
                        @endfor
                    </tr>
                </thead>
                <tbody>
                    @foreach ($absensis as $index => $absensi)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $absensi->nidn }}</td>
                            <td class="text-start">{{ $absensi->nama }}</td>
                            <td>{{ $absensi->jabatan }}</td>
                            <td class="text-start">{{ $absensi->matkul }}</td>

                            @for ($i = 1; $i <= 32; $i++)
                                <td>{{ $absensi->{'tgl_' . $i} ?? '' }}</td>
                            @endfor

                            <td>{{ $absensi->jumlah_kehadiran }}</td>
                            <td>{{ $absensi->jumlah_sks }}</td>
                            <td>Rp {{ number_format($absensi->honor_sks, 0, ',', '.') }}</td>
                            <td>Rp {{ number_format($absensi->total_honor, 0, ',', '.') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
