<?php
	
	namespace App;
	
	use Illuminate\Database\Eloquent\Model;
	
	class Venture extends Model
	{
		protected $fillable = [
			'title',
			'description',
			'color',
			'cover',
			'capacity',
			'unit_price',
			'project_return',
			'duration',
			'free'
		];
		
		public function impacts()
		{
			return $this->belongsToMany(Impact::class, 'venture_impacts');
		}
		
		public function phases()
		{
			return $this->hasMany(Phase::class, 'venture_id', 'id');
		}
		
		public function partners()
		{
			return $this->hasMany(Partner::class, 'venture_id', 'id');
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
		
		public function addToCart()
		{
			return $this->hasMany(Cart::class, 'usage_id', 'id');
		}
	}
