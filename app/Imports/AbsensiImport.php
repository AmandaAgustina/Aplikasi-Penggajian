<?php

namespace App\Imports;

use App\Models\Absensi;
use Maatwebsite\Excel\Concerns\ToModel;

class AbsensiImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Absensi([
            'nidn' => $row['nid'],
            'nama_dosen' => $row['nama_dosen'],
            'jumlah_absensi' => $row['jumlah_absensi'],
            'bulan' => $row['bulan'],
            'tahun' => $row['tahun'],
        ]);
    }
}