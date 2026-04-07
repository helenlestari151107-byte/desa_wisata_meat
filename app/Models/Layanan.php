<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Layanan extends Model {
    protected $table = 'layanan';

    protected $fillable = [
        'nama',
        'ikon',
        'deskripsi',
        'warna_ikon',
        'urutan',
        'is_aktif'
    ];
    protected $casts = ['is_aktif' => 'boolean'];
}