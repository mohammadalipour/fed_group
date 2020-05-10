<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
	 */
	public function users()
	{
		return $this->belongsToMany(User::class, 'user_roles');
	}
}
