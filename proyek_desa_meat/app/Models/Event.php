<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Event extends Model {
    protected $fillable = [
        'nama_event',
        'deskripsi',
        'tanggal_mulai',
        'tanggal_selesai',
        'lokasi',
        'gambar',
        'is_aktif'
    ];
    protected $casts = ['tanggal_mulai' => 'date','tanggal_selesai' => 'date','is_aktif' => 'boolean'];
}