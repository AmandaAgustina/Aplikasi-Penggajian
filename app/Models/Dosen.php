<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    protected $guarded = ['id'];

    public function matkuls()
    {
        return $this->hasMany(Matkul::class, 'dosen_matkul');
    }

    public function jadwalDosen()
    {
        return $this->hasMany(JadwalDosen::class, 'dosen_id');
    }
}
