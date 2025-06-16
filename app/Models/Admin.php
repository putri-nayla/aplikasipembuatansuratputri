<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Admin extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'admin';

    protected $fillable = [
        'namaadmin',
        'username',
        'password',
        'status',
        'role',
        'foto',
        'setujui'
    ];

    protected $hidden = [
        'password',
    ];

    protected $casts = [
        'setujui' => 'datetime',
    ];
}
