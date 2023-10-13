<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Authors extends Model
{
    use HasFactory;
    protected $fillable =[
        'name_of_the_Author',
        'biography',
        'author_birthdate',
        'nationality',
        'user_id'
    ];

    public function books()
    {
        return $this->hasMany(Books::class, 'Author_id');
    }
    public function user(){ 
        return $this->belongsTo(User::class);
    }
    
}
