<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pinjam extends Model
{
    protected $table = 'pinjams';

    protected $fillable = [
        'siswa_id',
        'petugas_id',
        'tanggal_pinjam',
    ];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }

    public function petugas()
    {
        return $this->belongsTo(Petugas::class);
    }

    public function pinjamDetails()
    {
        return $this->hasMany(PinjamDetail::class);
    }

    public function bukus()
    {
        return $this->hasManyThrough(Buku::class, PinjamDetail::class, 'pinjam_id', 'id', 'id', 'buku_id');
    }
}
