<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    private $product;
    public function __construct(){
        $this->product =new Products;
    }
    public function index(Request $request){
        $data=Products::all();
        return view('clients.home',compact('data'));
    }
    public function addCart($id=0){
        $id_user=Auth::id();
        $cart=new Cart;
        $cart->user_id= $id_user;
        $cart->product_id=$id;
        $cart->save();
        return redirect()->route('home')->with('alert','them thanh cong');
    }
    public function category(){
        $loai=$this->product->category();
        return view('admin.add',compact('loai'));
    }
    public function addProduct(ProductRequest $request){
        $image=time().'.'.$request->image->extension();
        $request->image->move(public_path('images'),$image);
        $id_product=$this->product->addProduct($request->product_name,$request->product_type,$request->price,$image);
        $id_product=1;
        $fill=$this->product->getFillabe($request->product_type);
        return view('admin.add_detail',compact('fill','id_product'));
    }
    public function getDetail(){
        $loai=$this->product->category();
        return view('admin.add',compact('loai'));
    }
    public function addDetail(Request $request){
        $data=$request->all();
        unset($data['_token']);
        $this->product->addDetail($data);
    }
    public function getProduct($id){
        $product=Products::find($id);
        if($product != null){
            $type=$this->product->getFillabe($product->product_type);
            $detail=$this->product->getDetail($id)->toArray();
            return view('admin.edit_product',compact('detail','product','type'));
        }
        return redirect()->route('admin.page')->with('alert','Sản phẩm không tồn tại ');
    }
    public function editProduct(Request $request){
        $id=$request->id;
        $data=$request->all();
        unset($data['_token']);
        unset($data['id']);
        $msg=$this->product->updateProduct($data,$id);
        return redirect()->route('admin.page')->with('alert','Chỉnh sửa thành công');
    }
    public function detail($id){
        $product=Products::find($id);
        $detail=$this->product->getDetail($id);
        $fill=$this->product->getFillabe($product->product_type)->toArray();
        return view('clients.detail',compact('product','detail','fill'));
    }
    public function searchProduct(Request $request){
        $search=$request->search;
        $data =$this->product->search($search);
        return view('clients.home',compact('data'));
    }
}
