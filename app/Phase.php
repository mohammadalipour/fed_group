<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Phase extends Model
{
	public function details()
	{
		return $this->hasMany(PhaseDetail::class,'phase_id','id');
	}
}
