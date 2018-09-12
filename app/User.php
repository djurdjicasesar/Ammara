<?php

namespace App;

use Cartalyst\Sentinel\Users\EloquentUser;

class User extends EloquentUser
{
   
	
	protected static $orderModel='App\Order';
	
	public function order()
	{
		return $this->hasMany(static::$orderModel, 'user_id');
	}
}
