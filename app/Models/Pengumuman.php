<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengumuman extends Model
{
    protected $table = 'pengumumans';

    protected $fillable = [
        'judul',
        'isi',
        'tipe',
        'tanggal',
        'berakhir_pada',
        'is_aktif'
    ];

    protected $casts = [
        'tanggal' => 'date',
        'berakhir_pada' => 'date',
        'is_aktif' => 'boolean'
    ];
}