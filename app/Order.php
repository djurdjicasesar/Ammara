<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model{

    protected $fillable=['user_id','cart','address','name'];
	
	protected static $userModel='App\User';
	
	public function user(){
    return $this->belongsTo(static::$userModel,'user_id');
	}
	
	

}
	/*
	* save orders
	* @return order 
	*/
	public function saveOrder($order)
	{
		return $this->fill($order)->save();
	}
	
}