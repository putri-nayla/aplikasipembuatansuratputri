<?php

return [

    'defaults' => [
        'guard' => 'admin', // 🔥 Ubah ke 'admin' agar langsung sesuai
        'passwords' => 'admins',
    ],

    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'users', // 🔥 Pastikan 'users' ada di 'providers'
        ],
        'guards' => [
    'web' => [
        'driver' => 'session',
        'provider' => 'users',
    ],
'guards' => [
    'web' => [
        'driver' => 'session',
        'provider' => 'users',
    ],
],

    'kategori' => [
        'driver' => 'session',
        'provider' => 'kategoris', // pastikan nama ini cocok
    ],
],

'providers' => [
    'users' => [
        'driver' => 'eloquent',
        'model' => App\Models\User::class,
    ],

    'kategoris' => [ // <- tambahkan ini jika belum ada
        'driver' => 'eloquent',
        'model' => App\Models\Kategori::class,
    ],
],

   

        'admin' => [
            'driver' => 'session',
            'provider' => 'admins',
        ],

        'kategori' => [
            'driver' => 'session',
            'provider' => 'kategoris',
        ],
    ],

    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => App\Models\User::class,
        ],

        'admins' => [
            'driver' => 'eloquent',
            'model' => App\Models\Admin::class,
        ],

        'kategoris' => [
            'driver' => 'eloquent',
            'model' => App\Models\kategori::class,
        ],
    ],

    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => 'password_reset_tokens',
            'expire' => 60,
            'throttle' => 60,
        ],
        'admins' => [
            'provider' => 'admins',
            'table' => 'password_reset_tokens',
            'expire' => 60,
            'throttle' => 60,
        ],
        'kategori' => [
            'provider' => 'kategoris',
            'table' => 'password_reset_tokens',
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

    'password_timeout' => 10800,

];

