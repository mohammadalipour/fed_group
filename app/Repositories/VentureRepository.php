<?php
	
	namespace App\Repositories;
	
	
	use App\Entities\Entity;
	use App\Entities\VentureEntity;
	use App\Venture;
	use Carbon\Carbon;
	
	class VentureRepository implements RepositoryInterface
	{
		
		/**
		 * @param VentureEntity $entity
		 * @return mixed
		 */
		public function create(Entity $entity)
		{
			return Venture::create(
				[
					'title'          => $entity->getTitle(),
					'description'    => $entity->getDescription(),
					'color'          => $entity->getColor(),
					'cover'          => $entity->getCover(),
					'capacity'       => $entity->getCapacity(),
					'unit_price'     => $entity->getUnitPrice(),
					'project_return' => $entity->getProjectReturn(),
					'duration'       => $entity->getDuration(),
					'free'           => $entity->getFree(),
				]
			);
		}
		
		/**
		 * @param $id
		 * @return mixed
		 */
		public function get($id)
		{
			return Venture::find($id);
		}
		
		/**
		 * @return mixed
		 */
		public function all()
		{
			return Venture::all();
		}
		
		/**
		 * @param $id
		 * @return int
		 */
		public function delete($id)
		{
			return Venture::destroy($id);
		}
		
		/**
		 * @param $id
		 * @param array $data
		 * @return mixed
		 */
		public function update($id, array $data)
		{
			return Venture::find($id)->update($data);
		}
		
		/**
		 * @inheritDoc
		 */
		public function paginate($perPage = 10)
		{
			return Venture::paginate($perPage);
		}
		
		public function addToCard(Venture $venture, int $userId, int $count)
		{
			try {
				return $venture->addToCart()->create(
					[
						'user_id'    => $userId,
						'usage_type' => Venture::class,
						'count'      => $count,
						'expired_at' => Carbon::now()->addHour(),
						'created_at' => Carbon::now(),
						'updated_at' => Carbon::now()
					]
				);
			} catch (\Exception $exception) {
				throw new \Exception($exception->getMessage());
			}
			
		}
	}