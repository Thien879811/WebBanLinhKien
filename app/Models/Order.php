<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;
use App\Models\Order_Product;
use App\Models\User;
class Order extends Model
{
    use HasFactory;
    protected $table='orders';
    public function getProductOrder(): BelongsToMany
    {
        return $this->belongsToMany(Products::class);
    }

    public function createOrder($id_user,$product_id,$quantity,$total){
        $check=$this->where('user_id',$id_user)->get();
        if( $check->count() > 0){
            $cart_id=$this->getIDCart($id_user);
            $data=new Order_Product;
            $data->createOrderProduct($cart_id,$product_id,$quantity,$total);
        }else{
            $this->user_id=$id_user;
            $this->save();
            $data=new Order_Product;
            $cart_id=$this->getIDCart($id_user);
            $data->createOrderProduct($cart_id,$product_id,$quantity,$total);
        }
    }
    public function getIDCart($user){
        $cart_id=User::find($user)->getOrder;
        return $cart_id->id;
    }
}
