<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Petugas extends Model
{
    use HasFactory;

    protected $table = 'petugass';

    protected $fillable = [
        'NIP',
        'Nama_Petugas',
        'No_Telp',
    ];

    public function pinjams()
    {
        return $this->hasMany(Pinjam::class);
    }
}
