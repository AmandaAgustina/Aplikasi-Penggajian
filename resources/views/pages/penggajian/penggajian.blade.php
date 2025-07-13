@extends('layouts.app')

@section('content')
    @php
        use App\Models\Matkul;
    @endphp
    <div class="container">
        <h4 class="mb-4">Penggajian Dosen</h4>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered table-hover text-center">
            <thead class="table-primary">
                <tr>
                    <th>No</th>
                    <th>Nama Dosen</th>
                    <th>Jarak (km)</th>
                    <th>Jumlah SKS</th>
                    @foreach ($tunjangans as $item)
                        <th>{{ $item->nama }}</th>
                    @endforeach
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dosens as $index => $dosen)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $dosen->nama }}</td>

                        @php
                            $sks = '';

                            $jarak = $jarak_sks->harga_jarak * $dosen->jarak ?? 0;
                            if ($dosen->jadwalDosen) {
                                $sks =
                                    Matkul::whereIn('id', $dosen->jadwalDosen->pluck('matkul_id'))->sum('sks') *
                                        $jarak_sks->harga_sks ??
                                    0;
                            }
                            $gaji_pokok = $dosen->tunjangan->gaji_pokok ?? 0;
                            $tunjangan = $dosen->tunjangan->tunjangan ?? 0;
                            $total = $gaji_pokok + $tunjangan;
                        @endphp

                        <td>Rp. {{ number_format($jarak, 0, ',', '.') }}</td>
                        <td>Rp. {{ number_format($sks, 0, ',', '.') }}</td>
                        @foreach ($tunjangans as $item)
                            <td> <input type="checkbox" class="form-control"></td>
                        @endforeach
                        <td><strong>Rp {{ number_format($total, 0, ',', '.') }}</strong></td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
