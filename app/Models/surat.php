<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surat extends Model
{
    use HasFactory;

    protected $fillable = ['judul', 'file'];

    

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function surat()
    {
        return $this->belongsTo(surat::class);
    }
}