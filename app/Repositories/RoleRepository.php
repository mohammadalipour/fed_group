<?php
	
	namespace App\Repositories;
	
	
	use App\Entities\Entity;
	use App\Role;
	
	class RoleRepository implements RepositoryInterface
	{
		
		/**
		 * @inheritDoc
		 */
		public function get($id)
		{
			return Role::find($id);
		}
		
		/**
		 * @inheritDoc
		 */
		public function all()
		{
			return Role::all();
		}
		
		/**
		 * @inheritDoc
		 */
		public function delete($id)
		{
			return Role::destroy($id);
		}
		
		/**
		 * @inheritDoc
		 */
		public function update($id, array $data)
		{
			return Role::find($id)->update($data);
		}
		
		/**
		 * @param RoleEntity $entity
		 * @return mixed
		 */
		public function create(Entity $entity)
		{
			return Role::create(
				[
					'type' => $entity->getType()
				]
			);
		}
		
		/**
		 * @inheritDoc
		 */
		public function paginate($perPage = 10)
		{
			return Role::paginate($perPage);
		}
	}