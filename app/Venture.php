<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venture extends Model
{
	public function impacts()
	{
		return $this->belongsToMany(Impact::class, 'venture_impacts');
    }
    
	public function phases()
	{
		return $this->hasMany(Phase::class,'venture_id','id');
    }
	
	public function partners()
	{
		return $this->hasMany(Partner::class,'venture_id','id');
	}
	
	public function keyFacts()
	{
		return new KeyFact();
	}
	
	public function safeGurds()
	{
		return new SafeGuard();
	}
	
	public function ReturnPeriods()
	{
		return new ReturnPeriod();
	}
}
