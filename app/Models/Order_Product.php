<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\Products;


class Order_Product extends Model
{
    use HasFactory;
    protected $table='order_products';
    function createOrderProduct($id_order,$product_id,$quantity,$total){
        $order=new Order_Product;
        $order->order_id=$id_order;
        $order->products_id=$product_id;
        $order->quantity=$quantity;
        $order->total=$total;
        $order->save();
        $product=Products::find($product_id);
        $product->product_quantity=$product->product_quantity-$quantity;
        $product->save();
    }
    
    public function getProductOrder():BelongsToMany{
        return $this->belongsToMany(Products::class,'orders','order_id','products_id');
    }
}
