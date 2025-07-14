<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penggajian extends Model
{
    protected $guarded = ['id'];

    public function tunjangan()
    {
        return $this->belongsTo(Tunjangan::class);
    }

    public function dosen()
    {
        return $this->belongsTo(Dosen::class);
    }
}
