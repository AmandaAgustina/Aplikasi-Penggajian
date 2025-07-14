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
                            @php
                                $key = $dosen->id . '-' . $item->id;
                            @endphp
                            <td>
                                <input type="checkbox" class="form-check-input tunjangan-check"
                                    data-dosen-id="{{ $dosen->id }}" data-tunjangan-id="{{ $item->id }}"
                                    {{ in_array($key, $penggajians) ? 'checked' : '' }}>
                            </td>
                        @endforeach

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        document.querySelectorAll('.tunjangan-check').forEach(checkbox => {
            checkbox.addEventListener('change', function() {
                const dosenId = this.dataset.dosenId;
                const tunjanganId = this.dataset.tunjanganId;
                const isChecked = this.checked;

                fetch("{{ route('penggajian.store') }}", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            "X-CSRF-TOKEN": "{{ csrf_token() }}"
                        },
                        body: JSON.stringify({
                            dosen_id: dosenId,
                            tunjangan_id: tunjanganId,
                            checked: isChecked
                        })
                    }).then(response => response.json())
                    .then(data => {
                        console.log(data.message);
                    });
            });
        });
    </script>
@endpush
