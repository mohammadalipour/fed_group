<?php
	
	namespace App\Repositories;
	
	
	use App\Entities\Entity;
	use App\Entities\OrderEntity;
	use App\Order;
	
	class OrderRepository implements RepositoryInterface
	{
		
		/**
		 * @param OrderEntity $entity
		 * @return mixed
		 */
		public function create(Entity $entity)
		{
			return Order::create(
				[
					'status'   => $entity->getStatus(),
					'price'    => $entity->getPrice(),
					'discount' => $entity->getDiscount(),
					'user_id'  => $entity->getUserId()
				]
			);
		}
		
		/**
		 * @param $id
		 * @return mixed
		 */
		public function get($id)
		{
			return Order::find($id);
		}
		
		/**
		 * @return mixed
		 */
		public function all()
		{
			return Order::all();
		}
		
		/**
		 * @param $id
		 * @return int
		 */
		public function delete($id)
		{
			return Order::destroy($id);
		}
		
		/**
		 * @param $id
		 * @param array $data
		 * @return mixed
		 */
		public function update($id, array $data)
		{
			return Order::find($id)->update($data);
		}
		
		/**
		 * @inheritDoc
		 */
		public function paginate($perPage = 10)
		{
			return Order::paginate($perPage);
		}
	}