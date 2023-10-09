<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Order_Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function getOrder(){
        return redirect()->route('showcart');
    }
    public function addOrder(Request $request)
    {
        $user_id=Auth::id();
        $order=new Order;
        $data=$request->selceted_add;
        $user=new User;
        if($user->checkInfo()==1){
            if($data != null ){
                foreach ($data as $key => $value) {
                    $product_id=Cart::find($value)->products_id;
                    $quantity=Cart::find($value)->quantity;
                    $data_product=Cart::find($value)->getProduct;
                    $total = $quantity *  $data_product->price;
                    $order->createOrder($user_id,$product_id,$quantity, $total);
                }
                return redirect()->route('showcart')->with('alert','Đặt hàng thành công !');
            }
            return redirect()->route('showcart')->with('alert','Vui lòng chọn sản phẩm !');
        }
        return redirect()->route('taikhoan.getuser')->with('alert','Vui lòng cập nhật thông tin trước khi mua hàng!');
    }


    public function showOrder(Request $request){
        $user=Auth::id();
        $order=new Order;
        $id_order=$order->getIDCart($user);
        $product=Order::find($id_order)->getProductOrder()->select()->where('status',0)->get();
        return view('clients.order',compact('product'));
    }
    public function order(){
        $order=new Order;
        $data=$order->getOrderUser();
        $product=$order->getOrderProduct();
        return view('admin.order',compact('data','product'));
    }
}
