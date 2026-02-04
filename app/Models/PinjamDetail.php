<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PinjamDetail extends Model
{
    protected $fillable = ['pinjam_id', 'buku_id'];

    public function pinjam(): BelongsTo
    {
        return $this->belongsTo(Pinjam::class);
    }

    public function buku(): BelongsTo
    {
        return $this->belongsTo(Buku::class);
    }
}