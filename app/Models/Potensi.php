<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Potensi extends Model {
    protected $table = 'potensi';

    protected $fillable = [
        'nama',
        'kategori',
        'deskripsi',
        'gambar',
        'rating',
        'lokasi',
        'tags',
        'is_aktif'
    ];
    protected $casts = ['is_aktif' => 'boolean','rating' => 'float'];
}