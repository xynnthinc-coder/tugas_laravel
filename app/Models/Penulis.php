<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penulis extends Model
{
    protected $table = 'penuliss';

    protected $fillable = [
        'nama_penulis',
        'no_telp',
    ];

    public function bukus()
    {
        return $this->hasMany(Buku::class);
    }
}
