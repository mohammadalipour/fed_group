<?php
	
	namespace App;
	
	use Illuminate\Database\Eloquent\Model;
	
	class Cart extends Model
	{
		protected $fillable = [
			'user_id',
			'usage_id',
			'usage_type',
			'count',
			'expired_at'
		];
		
		public function venture()
		{
			return $this->belongsTo(Venture::class, 'usage_id', 'id');
		}
		
		
		public function package()
		{
			return $this->belongsTo(Package::class, 'usage_id', 'id');
		}
	}
