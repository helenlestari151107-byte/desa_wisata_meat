<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class KontakDesa extends Model {
    protected $fillable = [
        'nama',
        'jabatan',
        'nomor',
        'email',
        'ikon'
    ];
}