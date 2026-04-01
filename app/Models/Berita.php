<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Berita extends Model {
    protected $fillable = [
        'judul',
        'slug',
        'kategori',
        'isi',
        'gambar',
        'penulis',
        'views',
        'published_at',
        'is_published'
    ];
    protected $casts = ['published_at' => 'datetime','is_published' => 'boolean'];

    protected static function boot() {
        parent::boot();
        static::creating(function ($model) {
            if (empty($model->slug)) {
                $model->slug = Str::slug($model->judul);
            }
            if (empty($model->published_at)) {
                $model->published_at = now();
            }
        });
    }
}