<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Hien thi san pham
     */
    public function index()
    {
        $id_user=Auth::id();
        $product=User::find($id_user)
        ->product()
        ->select()
        ->get();
        return view('clients.cart',compact('product'));
    }

    /**
     * Xoa san pham khoi gio hang
     */
    public function deleteCart($id)
    {
        $id_user=Auth::id();
        $cart=new Cart;
        $product=$cart->checkProduct($id,$id_user);
        if($product->get()->count() > 0){
            $product->delete();
            return redirect()->route('showcart')->with('alert','Sẳn phẩm đã được xoá');
        }
        return redirect()->route('showcart')->with('alert','Sẳn phẩm không tồn tại');
    }
    /**
     * Them san pham vao gio hang
     */
    public function addCart($id)
    {
        $id_user=Auth::id();
        $cart=new Cart;
        $product=$cart->checkProduct($id,$id_user)->get();
        if($product->count()==0)
       {
        $cart->user_id= $id_user;
        $cart->products_id=$id;
        $cart->quantity=1;
        $cart->save();
        return redirect()->route('home')->with('alert','Sẳn phẩm đã được thêm vào giỏi hàng');
       }
       return redirect()->route('home')->with('alert','Sẳn phẩm đã có trong giỏi hàng');
    }
    public function increase($id){
        $cart=Cart::find($id);
        $quantity=$cart->quantity;
        if($quantity < 100){
            $cart->quantity=$quantity+1;
            $cart->save();
            return redirect()->route('showcart');
        }
        return redirect()->route('showcart')->with('alert','Không thể thực hiện thao tác này !');
    }
    public function reduce($id){
        $cart=Cart::find($id);
        $quantity=$cart->quantity;
        if($quantity > 1){
            $cart->quantity=$quantity-1;
            $cart->save();
            return redirect()->route('showcart');
        }
        return redirect()->route('showcart')->with('alert','Không thể thực hiện thao tác này !');
    }
}
