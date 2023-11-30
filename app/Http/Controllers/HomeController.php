<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Products;
use App\Models\User;

class HomeController extends Controller
{
    private $product;
    public function __construct(){
        $this->product =new Products;
    }
    public function index(Request $request){
        $data=Products::all();
        $loai=$this->product->category();
        return view('clients.home',compact('data','loai'));
    }
    public function pageAdmin(){
        $data=Products::all();
        return view('admin.home',compact('data'));
    }
}
