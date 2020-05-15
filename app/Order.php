<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
	public function items()
	{
		return $this->hasMany(OrderItem::class,'order_id','id');
	}
	
	public function user()
	{
		return $this->hasOne(User::class,'id','user_id');
	}
}
