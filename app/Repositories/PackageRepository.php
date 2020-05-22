<?php
	
	namespace App\Repositories;
	
	
	use App\Entities\Entity;
	use App\Package;
	use Carbon\Carbon;
	
	class PackageRepository implements RepositoryInterface
	{
		
		/**
		 * @param PackageEntity $entity
		 * @return mixed
		 */
		public function create(Entity $entity)
		{
			return Package::create(
				[
					'title'       => $entity->getTitle(),
					'description' => $entity->getDescription(),
					'price'       => $entity->getPrice(),
					'count'       => $entity->getCount(),
					'venture_id'  => $entity->getVentureId()
				]
			);
		}
		
		/**
		 * @param $id
		 * @return mixed
		 */
		public function get($id)
		{
			return Package::find($id);
		}
		
		/**
		 * @return mixed
		 */
		public function all()
		{
			return Package::all();
		}
		
		/**
		 * @param $id
		 * @return int
		 */
		public function delete($id)
		{
			return Package::destroy($id);
		}
		
		/**
		 * @param $id
		 * @param array $data
		 * @return mixed
		 */
		public function update($id, array $data)
		{
			return Package::find($id)->update($data);
		}
		
		/**
		 * @inheritDoc
		 */
		public function paginate($perPage = 10)
		{
			return Package::paginate($perPage);
		}
		
		
		public function addToCard(Package $package, int $userId, int $count)
		{
			return $package->addToCart()->create(
				[
					'user_id'    => $userId,
					'count'      => $count,
					'usage_type' => Package::class,
					'expired_at' => Carbon::now()->addHour(),
					'created_at' => Carbon::now(),
					'updated_at' => Carbon::now()
				]
			);
		}
	}