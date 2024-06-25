<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'quantity',
        'manufacturer',
        'price',
        'category_id',
        'image_path',
    ];

    public function category(){
        return $this->belongsTo(Categories::class);
    }

    public function orderItems(){
        return $this->hasMany(OrderItems::class);
    }

    public function cartItems(){
        return $this->hasMany(CartItems::class);
    }

    public function reviews(){
        return $this->hasMany(Review::class);
    }

}
