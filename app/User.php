<?php
	
	namespace App;
	
	use Carbon\Carbon;
	use Illuminate\Foundation\Auth\User as Authenticatable;
	use Illuminate\Notifications\Notifiable;
	use Tymon\JWTAuth\Contracts\JWTSubject;
	
	class User extends Authenticatable implements JWTSubject
	{
		use Notifiable;
		
		/**
		 * The attributes that are mass assignable.
		 *
		 * @var array
		 */
		protected $fillable = [
			'name', 'email', 'password', 'mobile_number'
		];
		
		/**
		 * The attributes that should be hidden for arrays.
		 *
		 * @var array
		 */
		protected $hidden = [
			'password', 'remember_token',
		];
		
		/**
		 * The attributes that should be cast to native types.
		 *
		 * @var array
		 */
		protected $casts = [
			'mobile_verified_at' => 'datetime',
		];
		
		public function getJWTIdentifier()
		{
			return $this->getKey();
		}
		
		public function getJWTCustomClaims()
		{
			return [];
		}
		
		/**
		 * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
		 */
		public function role()
		{
			return $this->belongsToMany(Role::class, 'user_roles')->withTimestamps();
		}
		
		/**
		 * @param Role $role
		 * @return \Illuminate\Database\Eloquent\Model
		 */
		public function assignRole(Role $role)
		{
			return $this->role()->save($role);
		}
		
		public function cart()
		{
			return $this->hasOne(Cart::class, 'user_id', 'id')
				->where('expired_at', '>', Carbon::now());
		}
		
		public function order()
		{
			return $this->hasMany(Order::class, 'user_id', 'id');
		}
	}
