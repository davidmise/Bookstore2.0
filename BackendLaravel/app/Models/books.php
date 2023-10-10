<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'author_id',
        'genre_id',
        'genre_id',
        'price',
        'published_date',
        'cover_image',
    ];

    public function author()
    {
        return $this -> belongsTo(Authors::class);
    }

    public function genre()
    {
        return $this -> belongsTo(Genre::class);
    }

    public function reviews()
    {
        return $this -> hasMany(Reviews::class);
    }

    
}
