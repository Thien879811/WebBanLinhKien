<?php

namespace App\Http\Controllers;

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
    public function addProduct(Request $request){

        $request->validate([
            'image.*'=>'required|image|mimes:jpg, jpeg, png, bmp, gif, svg,webp|max:5120'
        ]);

        // $image=time().'.'.$request->image->extension();
        // $request->image->move(public_path('images'),$image);

        // $id_product=$this->product->addProduct($request->product_name,$request->product_type,$request->price,$image);
        $id_product=1;
        $fill=$this->product->getFillabe($request->product_type);
        return view('admin.add_detail',compact('fill','id_product'));
    }
    public function getDetail(){
        $loai=$this->product->category();
        return view('admin.add',compact('loai'));
    }
    public function addDetail(Request $request){
        $id_product=1;
        $data=$request->all();
        unset($data['_token']);
        $this->product->addDetail($data);
    }
}
