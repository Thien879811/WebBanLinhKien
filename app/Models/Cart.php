<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Cart extends Model
{
    use HasFactory;
    protected $table='carts';
    
    public function product(): HasMany
    {
        return $this->hasMany(Products::class,'products_id','id');
    }
    public function checkProduct($product_id,$user_id)
    {
        return Cart::where('products_id',$product_id)
        ->where('user_id',$user_id);
    }
    public function getProduct(): BelongsTo
    {
        return $this->BelongsTo(Products::class,'products_id');
    }
}
