<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class ProfilDesa extends Model {
    protected $table = 'profil_desa';
    protected $fillable = [
        'nama_desa',
        'sejarah',
        'visi',
        'misi',
        'luas_wilayah',
        'jumlah_penduduk',
        'jumlah_kk',
        'nama_kepala_desa',
        'foto_kepala_desa',
        'lat',
        'lng',
        'no_telepon',
        'email_desa',
        'alamat'
    ];
}