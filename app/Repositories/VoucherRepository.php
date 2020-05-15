<?php
	
	namespace App\Repositories;
	
	
	use App\Entities\Entity;
	use App\Role;
	use App\Voucher;
	
	class VoucherRepository implements RepositoryInterface
	{
		
		/**
		 * @inheritDoc
		 */
		public function get($id)
		{
			return Voucher::find($id);
		}
		
		/**
		 * @inheritDoc
		 */
		public function all()
		{
			return Voucher::all();
		}
		
		/**
		 * @inheritDoc
		 */
		public function delete($id)
		{
			return Voucher::destroy($id);
		}
		
		/**
		 * @inheritDoc
		 */
		public function update($id, array $data)
		{
			return Voucher::find($id)->update($data);
		}
		
		/**
		 * @param RoleEntity $entity
		 * @return mixed
		 */
		public function create(Entity $entity)
		{
			return Voucher::create(
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
			return Voucher::paginate($perPage);
		}
	}