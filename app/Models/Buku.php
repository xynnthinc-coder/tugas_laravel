<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    protected $table = 'bukus';

    protected $fillable = [
        'kode_buku',
        'judul_buku',
        'penulis_id',
        'penerbit_id',
        'stok',
    ];

    public function penulis()
    {
        return $this->belongsTo(Penulis::class, 'penulis_id');
    }

    public function penerbit()
    {
        return $this->belongsTo(Penerbit::class, 'penerbit_id');
    }

    public function pinjamDetails()
    {
        return $this->hasMany(PinjamDetail::class);
    }
}
