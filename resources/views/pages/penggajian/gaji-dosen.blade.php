@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="text-center mb-4">
            <h4>Slip Gaji Dosen</h4>

            {{-- ✅ Tombol Cetak PDF --}}
            <a target="_blank" class="btn btn-success mt-2">
                🖨️ Cetak PDF
            </a>
        </div>

        @foreach ($dosens as $dosen)
            @php
                // Hitung ulang untuk tampilkan saja (tidak proses baru)
                $jarak = $jarak_sks->harga_jarak * $dosen->jarak ?? 0;
                $jumlah_sks = 0;
                if ($dosen->jadwalDosen) {
                    $jumlah_sks = \App\Models\Matkul::whereIn('id', $dosen->jadwalDosen->pluck('matkul_id'))->sum(
                        'sks',
                    );
                }
                $honor_sks = $jumlah_sks * ($jarak_sks->harga_sks ?? 0);
                $gaji_pokok = $dosen->tunjangan->gaji_pokok ?? 0;
                $tunjangan = $dosen->tunjangan->tunjangan ?? 0;
                $total = $gaji_pokok + $tunjangan + $jarak + $honor_sks;
            @endphp

            <div class="border p-4 mb-4 shadow-sm" style="max-width: 500px; margin: 0 auto;">
                <h5 class="text-center mb-3">SLIP GAJI DOSEN</h5>
                <table class="table table-sm table-borderless">
                    <tr>
                        <td><strong>Nama Dosen</strong></td>
                        <td>: {{ $dosen->nama }}</td>
                    </tr>
                    <tr>
                        <td><strong>Jarak Tempuh</strong></td>
                        <td>: {{ $dosen->jarak }} km</td>
                    </tr>
                    <tr>
                        <td><strong>Honor Jarak</strong></td>
                        <td>: Rp {{ number_format($jarak, 0, ',', '.') }}</td>
                    </tr>
                    <tr>
                        <td><strong>Jumlah SKS</strong></td>
                        <td>: {{ $jumlah_sks }} SKS</td>
                    </tr>
                    <tr>
                        <td><strong>Honor SKS</strong></td>
                        <td>: Rp {{ number_format($honor_sks, 0, ',', '.') }}</td>
                    </tr>
                    <tr>
                        <td><strong>Gaji Pokok</strong></td>
                        <td>: Rp {{ number_format($gaji_pokok, 0, ',', '.') }}</td>
                    </tr>
                    <tr>
                        <td><strong>Tunjangan</strong></td>
                        <td>: Rp {{ number_format($tunjangan, 0, ',', '.') }}</td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <hr>
                        </td>
                    </tr>
                    <tr>
                        <td><strong>Total Gaji</strong></td>
                        <td><strong>: Rp {{ number_format($total, 0, ',', '.') }}</strong></td>
                    </tr>
                </table>
                <p class="text-end mt-4"><em>{{ now()->format('d M Y') }}</em></p>
            </div>
        @endforeach
    </div>
@endsection
