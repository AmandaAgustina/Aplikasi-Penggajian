@extends('layouts.app')

@section('content')
    @foreach ($dosens as $dosen)
        @php
            $jarak = ($jarak_sks->harga_jarak ?? 0) * ($dosen->jarak ?? 0);
            $jumlah_sks = 0;

            if ($dosen->jadwalDosen) {
                $matkul = \App\Models\Matkul::whereIn('id', $dosen->jadwalDosen->pluck('matkul_id'))->get();
                $harga_sks_praktik =
                    $matkul->where('type', 'Praktikum')->sum('sks') * $jarak_sks->harga_sks_praktik ?? 0;
                $harga_sks_teori = $matkul->where('type', 'Teori')->sum('sks') * $jarak_sks->harga_sks_teori ?? 0;

                $jumlah_sks = $matkul->sum('sks');
            }

            $tunjangan_items = $tunjangan_tersedia->where('dosen_id', $dosen->id);
            $tunjangan_total = $tunjangan_items->sum(fn($item) => $item->tunjangan->nominal ?? 0);
            $total = $harga_sks_praktik + $harga_sks_teori + $jarak + $tunjangan_total;
        @endphp

        <div class="slip">
            <div class="border p-4 mb-4 shadow-sm" style="max-width: 500px; margin: 0 auto;">
                <h5 class="text-center mb-3">SLIP GAJI DOSEN</h5>
                {{-- ✅ Tombol Cetak PDF --}}
                <a target="_blank" class="btn btn-success mt-2" href="{{ route('slip-gaji.pdf') }}">
                    🖨️ Cetak PDF
                </a>
                <table class="table table-sm table-borderless">
                    <tr>
                        <td width="40%"><strong>Nama Dosen</strong></td>
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
                        <td><strong>Honor SKS Praktik</strong></td>
                        <td>: Rp {{ number_format($harga_sks_praktik, 0, ',', '.') }}</td>
                    </tr>
                    <tr>
                        <td><strong>Honor SKS Teori</strong></td>
                        <td>: Rp {{ number_format($harga_sks_teori, 0, ',', '.') }}</td>
                    </tr>
                    @forelse ($tunjangan_items as $item)
                        <tr>
                            <td><strong>{{ $item->tunjangan->nama }}</strong></td>
                            <td>: Rp {{ number_format($item->tunjangan->nominal, 0, ',', '.') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td><strong>Tunjangan Tambahan</strong></td>
                            <td>: Tidak ada</td>
                        </tr>
                    @endforelse

                    <tr>
                        <td colspan="2" class="total">
                            Total Gaji: Rp {{ number_format($total, 0, ',', '.') }}
                        </td>
                    </tr>
                </table>

                <div class="footer">
                    Dicetak pada: {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}
                </div>
            </div>
    @endforeach
@endsection
