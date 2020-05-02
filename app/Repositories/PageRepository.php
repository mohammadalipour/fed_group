<?php
	
	namespace App\Repositories;
	
	
	use App\Entities\Entity;
	use App\Entities\PageEntity;
	use App\Page;
	
	class PageRepository implements RepositoryInterface
	{
		
		/**
		 * @param PageEntity $entity
		 * @return mixed
		 */
		public function create(Entity $entity)
		{
			return Page::create(
				[
					'type'    => $entity->getType(),
					'content' => $entity->getContent()
				]
			);
		}
		
		/**
		 * @param $id
		 * @return mixed
		 */
		public function get($id)
		{
			return Page::find($id);
		}
		
		/**
		 * @return mixed
		 */
		public function all()
		{
			return Page::all();
		}
		
		/**
		 * @param $id
		 * @return int
		 */
		public function delete($id)
		{
			return Page::destroy($id);
		}
		
		/**
		 * @param $id
		 * @param array $data
		 * @return mixed
		 */
		public function update($id, array $data)
		{
			return Page::find($id)->update($data);
		}
		
		/**
		 * @inheritDoc
		 */
		public function paginate($perPage = 10)
		{
			return Page::paginate($perPage);
		}
		
		/**
		 * @param $type
		 * @return mixed
		 */
		public function findByType($type)
		{
			return Page::where('type', $type)->first();
		}
	}