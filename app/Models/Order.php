<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;
use App\Models\Order_Product;
use App\Models\Products;
use App\Models\User;
use Illuminate\Support\Facades\DB;
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
    public function getOrderUser(){
        $order=DB::table('orders')
        ->join('users','orders.user_id','=','users.id')
        ->select(['orders.*','users.fullname','users.address','users.phone'])
        ->where('status','=','0')
        ->get();
        return($order);
    }
    public function getOrderProduct(){
        $order=DB::table('order_products')
        ->join('products','order_products.products_id','=','products.id')
        ->get();
        return($order);
    }

    public function create_Order($id_user){
        $this->user_id=$id_user;
        $this->save();
        $order_id=$this->id;
        return $order_id;
    }
    public function get_Order_User($user_id){
        $order=DB::table('order_products')
        ->join('products','order_products.products_id','=','products.id')
        ->join('orders','order_products.order_id','=','orders.id')
        ->where('user_id',$user_id)
        ->get();
        return($order);
    }
    public function delete_Order($id){
        $order=DB::table('orders')
        ->where('id',$id)
        ->delete();
        $order=DB::table('order_products')
        ->where('order_id',$id)
        ->delete();
        return($order);
    }

    public function search($key){
        $order=DB::table('orders')
        ->join('users','orders.user_id','=','users.id')
        ->select(['orders.*','users.fullname','users.address','users.phone'])
        ->where('fullname','like','%'.$key.'%')
        ->get();
        return($order);
    }

    public function  orderDelivered(){
        $order = DB::table('orders')
             ->select(DB::raw('count(*) as count, status'))
             ->where('status', '=', 1)
             ->groupBy('status')
             ->get();
             return $order;
    }

    public function  orderUnDelivered(){
        $order = DB::table('orders')
             ->select(DB::raw('count(*) as count, status'))
             ->where('status', '=', 0)
             ->groupBy('status')
             ->get();
        return $order;
    }
     
    public function getOrderUserDelivered(){
        $order=DB::table('orders')
        ->join('users','orders.user_id','=','users.id')
        ->select(['orders.*','users.fullname','users.address','users.phone'])
        ->where('status','=','1')
        ->get();
        return($order);
    }
    public function getOrderProductDelivered(){
        $order=DB::table('order_products')
        ->join('products','order_products.products_id','=','products.id')
        ->get();
        return($order);
    }

    public function  numberProduct(){
        $number = DB::table('products')
            ->select(DB::raw('sum(product_quantity) as count'))
            ->get();
        return $number;
    }
}

