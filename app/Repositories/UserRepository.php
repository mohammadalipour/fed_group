<?php
	
	namespace App\Repositories;
	
	use Illuminate\Contracts\Auth\Authenticatable;
	use App\Entities\UserEntity;
	use App\User;
	
	class UserRepository implements UserRepositoryInterface
	{
		
		/**
		 * @inheritDoc
		 */
		public function get($userId)
		{
			return User::find($userId);
		}
		
		/**
		 * @inheritDoc
		 */
		public function all()
		{
			return User::all();
		}
		
		/**
		 * @inheritDoc
		 */
		public function delete($userId)
		{
			return User::destroy($userId);
		}
		
		/**
		 * @inheritDoc
		 */
		public function update($userId, array $userData)
		{
			return User::find($userId)->update($userData);
		}
		
		/**
		 * @param UserEntity $userEntity
		 * @return Authenticatable
		 */
		public function create(UserEntity $userEntity)
		{
			return User::create(
				[
					'email'    => $userEntity->getEmail(),
					'password' => bcrypt($userEntity->getPassword()),
					'name'     => $userEntity->getName(),
				]
			);
		}
	}
