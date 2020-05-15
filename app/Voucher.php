<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'title', 'capacity', 'max_off', 'expired_at'
	];
	
	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
	 */
	public function users()
	{
		return $this->belongsToMany(User::class, 'user_vouchers')->withTimestamps();
	}
}
