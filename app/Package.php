<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
	public function addToCart()
	{
		return $this->hasMany(Venture::class, 'usage_id', 'id');
	}
}
