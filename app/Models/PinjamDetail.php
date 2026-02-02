<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PinjamDetail extends Model
{
    protected $table = 'pinjam_details';
    
    protected $fillable = [
        'pinjam_id',
        'buku_id',
    ];

    public function pinjam()
    {
        return $this->belongsTo(Pinjam::class);
    }

    public function buku()
    {
        return $this->belongsTo(Buku::class);
    }
}
