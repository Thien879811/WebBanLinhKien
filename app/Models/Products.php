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
        dd($db);
    }
}
