<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penerima extends Model
{
    protected $fillable = ['nama', 'judul', 'tanggal_diterima'];
}
