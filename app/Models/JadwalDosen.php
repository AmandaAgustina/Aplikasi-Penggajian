<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JadwalDosen extends Model
{
    protected $guarded = ['id'];

    public function dosen()
    {
        return $this->belongsTo(Dosen::class);
    }

    public function matkul()
    {
        return $this->belongsTo(Matkul::class);
    }
}
