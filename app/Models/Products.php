<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Http\Client\Request;

class Products extends Model
{
    use HasFactory;
    protected $table='products';
    // public function getProduct(){
    //     $data=DB::table('products')->select()->get();
    //     return $data;
    // }
    protected $fillable = [
        'product_name',
        'product_type',
        'price',
        'images'
    ];
   // public $timestamps = false;
    public function cart(): BelongsTo
    {
        return $this->belongsTo(Cart::class);
    }
    public function category(){
        $data=DB::table('products_type')->get();
        return $data;
    }
    //lấy các cột cần thêm trong bản chi tiết
    public function getFillabe($id){
        $data=DB::table('fillable')->where('type_id',$id)->get();
        return $data;
    }
    public function addProduct($product_name,$product_type,$price,$image){
        $this->product_name=$product_name;
        $this->product_type=$product_type;
        $this->price=$price;
        $this->images=$image;
        $this->save();
        $data=$this->id;
        return $data;
    }
    public function addDetail(Array $data){
        $db=DB::table('products_detail')->insert([$data]);
        return $db;
    }
    public function getDetail($id){
        $db=DB::table('products_detail')
        ->select()
        ->where('product_id',$id)
        ->get();
        return $db;
    }
    public function detail($id){
        $data = DB::table('products')
            ->join('products_type', 'products_type.id', '=', 'products.product_type')
            ->join('products_detail', 'products.id', '=', 'products_detail.product_id')
            ->where('product_id',$id)
            ->get();
        return $data;
    }
    public function updateProduct(array $data,$id){
        $data = DB::table('products')
            ->join('products_detail', 'products.id', '=', 'products_detail.product_id')
            ->where('product_id',$id)
            ->update($data);
        return $data;
    }
    public function search($data){
        $data = DB::table('products_type')
            ->join('products', 'products_type.id', '=', 'products.product_type')
            ->where('product_name','like',"%".$data."%")
            ->orWhere('name','like',"%".$data."%")
            ->get();
        return $data;
    }
}
