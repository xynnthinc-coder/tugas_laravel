<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Petugas extends Model
{
    use HasFactory;

    protected $table = 'petugass';

    protected $fillable = [
        'nip',
        'nama_petugas',
        'no_telp',
    ];

    public function pinjams()
    {
        return $this->hasMany(Pinjam::class);
    }
}
