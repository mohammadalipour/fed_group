<?php
	
	namespace App\Repositories;
	
	
	use App\Cart;
	use App\Entities\Entity;
	
	class CartRepository implements RepositoryInterface
	{
		
		/**
		 * @param CartEntity $entity
		 * @return mixed
		 */
		public function create(Entity $entity)
		{
			return Cart::create(
				[
					'user_id'    => $entity->getUserId(),
					'usage_id'   => $entity->getUsageId(),
					'usage_type' => $entity->getUsageType(),
					'count'      => $entity->getCount(),
					'expired_at' => $entity->getExpiredAt()
				]
			);
		}
		
		/**
		 * @param $id
		 * @return mixed
		 */
		public function get($id)
		{
			return Cart::find($id);
		}
		
		/**
		 * @return mixed
		 */
		public function all()
		{
			return Cart::all();
		}
		
		/**
		 * @param $id
		 * @return int
		 */
		public function delete($id)
		{
			return Cart::destroy($id);
		}
		
		/**
		 * @param $id
		 * @param array $data
		 * @return mixed
		 */
		public function update($id, array $data)
		{
			return Cart::find($id)->update($data);
		}
		
		/**
		 * @inheritDoc
		 */
		public function paginate($perPage = 10)
		{
			return Cart::paginate($perPage);
		}
	}