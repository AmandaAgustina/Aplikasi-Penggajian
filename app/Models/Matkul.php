<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Matkul extends Model
{
    protected $guarded = ['id'];

    public function dosens()
    {
        return $this->belongsToMany(Dosen::class, 'dosen_matkul');
    }
}
