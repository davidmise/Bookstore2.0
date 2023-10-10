<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_items extends Model
{
    use HasFactory;
    protected $fillable =[
        'order_id',
        'book_id',
        'quantity'
    ];

    public function order()
    {
        return $this -> belongsTo(Orders::class);
    }

    public function book()
    {
        return $this -> belongsTo(Books::class);
    }
    public function user(){
        return $this -> belongsTo(User::class);
    }

    public function reader(){
        return $this -> belongsTo(Readers::class);
    }
}
