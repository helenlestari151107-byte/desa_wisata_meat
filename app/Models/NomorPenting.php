<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class NomorPenting extends Model {
    protected $table = 'nomor_penting';

    protected $fillable = [
        'nama',
        'kategori',
        'nomor_telepon',
        'warna',
        'ikon'
    ];
}