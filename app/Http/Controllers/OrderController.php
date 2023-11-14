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
    public function addOrder(Request $request){
        $user_id=Auth::id();
        $order=new Order;
        $order_product=new Order_Product;
        $data=$request->selceted_add;
        $order_id=$order->create_Order($user_id);
        $user=new User;
        if($user->checkInfo()==1){
            if($data != null ){
                foreach ($data as $key => $value) {
                    $product_id=Cart::find($value)->products_id;
                    $quantity=Cart::find($value)->quantity;
                    $data_product=Cart::find($value)->getProduct;
                    $total = $quantity *  $data_product->price;
                    $order_product->createOrderProduct($order_id,$product_id,$quantity, $total);
                }
                return redirect()->route('showcart')->with('alert','Đặt hàng thành công !');
            }
            return redirect()->route('showcart')->with('alert','Vui lòng chọn sản phẩm !');
        }
        return redirect()->route('taikhoan.getuser')->with('alert','Vui lòng cập nhật thông tin trước khi mua hàng!');
    }
    public function order(){
        $order=new Order;
        $data=$order->getOrderUser();
        $product=$order->getOrderProduct();
        return view('admin.order',compact('data','product'));
    }
    public function getOrderUser(){
        $user=Auth::id();
        $order=new Order;
        $data_order=$order->get_Order_User($user);
        return view('clients.order',compact('data_order'));
    }
    public function updateOrder($id){
        $order=Order::find($id);
        $order->status=1;
        $order->save();
        return redirect()->route('admin.order')->with('alert','Cập nhật thành công');
    }
    public function deleteOrder($id){
        $order=new Order;
        $order->delete_Order($id);
        return redirect()->route('admin.order')->with('alert','Xóa thành công');
    }
    public function search_order(Request $request){
        $order=new Order;
        $key=$request->search;
        $data=$order->search($key);
        $product=$order->getOrderProduct();
        return view('admin.order',compact('data','product'));
    }
}
