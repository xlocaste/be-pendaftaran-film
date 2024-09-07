<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    use HasFactory;

    protected $table = "film";

    protected $fillable = [
        'judul',
        'sinopsis',
        'tanggal_publish',
        'sutradara',
        'studio',
        'genre_id',
    ];

    public Function Genre()
    {
        return $this->belongsToMany(Genre::class, 'film_genre');
    }
}
