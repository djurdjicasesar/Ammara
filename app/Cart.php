<?php

namespace App;
use Session;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model{

    protected $fillable=['product_id','product_name','quantity','amount','total'];
	protected $table = 'cart';
	
	protected static $productModel='App\Product';
	
	public function products(){
    return $this->belongsTo(static::$productModel,'product_id');

}
	protected static $userModel='App\User';
	public function user(){
    return $this->belongsTo(static::$userModel,'user_id');
	}
	protected static $cartModel='App\Cart';
}

