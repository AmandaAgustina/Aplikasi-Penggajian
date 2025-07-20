@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="text-center mb-4">
            <h4>Slip Gaji Dosen</h4>

            {{-- ✅ Tombol Cetak PDF --}}
            <a target="_blank" class="btn btn-success mt-2" href="{{ route('slip-gaji.pdf') }}">
                🖨️ Cetak PDF
            </a>
        </div>

        @php
            $honor_teori = 0;
            $honor_praktik = 0;
            $jarak = ($jarak_sks->harga_jarak ?? 0) * ($dosen->jarak ?? 0);

            if ($dosen->jadwalDosen) {
                $matkuls = \App\Models\Matkul::whereIn('id', $dosen->jadwalDosen->pluck('matkul_id'))->get();

                foreach ($matkuls as $matkul) {
                    if (strtolower($matkul->type ?? '') === 'teori') {
                        $honor_teori += $matkul->sks * ($jarak_sks->harga_sks_teori ?? 0);
                    } elseif (strtolower($matkul->type ?? '') === 'praktik') {
                        $honor_praktik += $matkul->sks * ($jarak_sks->harga_sks_praktik ?? 0);
                    }
                }
            }

            $sks = $honor_teori + $honor_praktik;
            $gaji_pokok = $dosen->tunjangan->gaji_pokok ?? 0;
            $tunjangan = $dosen->tunjangan->tunjangan ?? 0;

            $total = $sks + $gaji_pokok + $tunjangan + $jarak;
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

                @forelse ($tunjangan_items as $item)
                    <tr>
                        <td><strong>{{ $item->tunjangan->nama }}</strong></td>
                        <td>: Rp {{ number_format($item->tunjangan->nominal, 0, ',', '.') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="2">Tidak ada tunjangan tambahan.</td>
                    </tr>
                @endforelse

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
            <p class="text-end mt-4">
                <strong>{{ now()->format('M Y') }}</strong>
            </p>
        </div>
        @endforeach
    </div>
@endsection
