<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
     use HasFactory;

    protected $fillable = [
        'nama',
        'mapel',
    ];

    public function siswas()
    {
        return $this->hasMany(Siswa::class);
    }
}
