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
        'Author_id',
        'genre_id',
        'price',
        'published_date',
        'cover_image',
    ];

    public function author()
    {
        return $this->belongsTo(Authors::class, 'Author_id');
    }

    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    
}
