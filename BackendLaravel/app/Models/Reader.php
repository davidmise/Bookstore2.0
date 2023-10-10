<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Readers extends Model
{
    use HasFactory;
    protected $fillable =[
        'name',
        'email',
        'password',
        'phone_number',
        'address',
        'cart_id',
        'order_id'
    ];
    public function user(){ 
        return $this -> belongsTo(User::class);
    }
    public function orders(){ 
        return $this -> hasMany(Orders::class);
    }
    public function order_items(){ 
        return $this -> hasMany(Order_items::class);
    }
    public function book(){
        return $this -> hasMany(Books::class);
    }

}
