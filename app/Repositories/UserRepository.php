<?php
	
	namespace App\Repositories;
	
	use App\Entities\Entity;
	use App\Entities\UserEntity;
	use App\User;
	
	class UserRepository implements RepositoryInterface
	{
		
		/**
		 * @inheritDoc
		 */
		public function get($id)
		{
			return User::find($id)->load('role');
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
		public function delete($id)
		{
			return User::destroy($id);
		}
		
		/**
		 * @inheritDoc
		 */
		public function update($id, array $data)
		{
			return User::find($id)->update($data);
		}
		
		/**
		 * @param UserEntity $entity
		 * @return mixed
		 */
		public function create(Entity $entity)
		{
			return User::create(
				[
					'email'         => $entity->getEmail(),
					'mobile_number' => $entity->getMobileNumber(),
					'password'      => bcrypt($entity->getPassword()),
					'name'          => $entity->getName(),
				]
			);
		}
		
		/**
		 * @inheritDoc
		 */
		public function paginate($perPage = 10)
		{
			return User::paginate($perPage)->load('role');
		}
		
		public function findByMobileNumber($mobileNumber)
		{
			return User::where('mobile_number', $mobileNumber)->first();
		}
	}
