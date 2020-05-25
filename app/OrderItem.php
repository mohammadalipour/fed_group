<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
	public function venture()
	{
		return $this->belongsTo(Venture::class, 'usage_id', 'id');
	}
	
	
	public function package()
	{
		return $this->belongsTo(Package::class, 'usage_id', 'id');
	}
}
