<?php
	/**
	 * Created by PhpStorm.
	 * User: Mohammad
	 * Date: 4/30/2020
	 * Time: 11:31 AM
	 */
	
	namespace App\Repositories;
	
	
	use App\Entities\Entity;
	
	interface RepositoryInterface
	{
		/**
		 * @param Entity $entity
		 * @return mixed
		 */
		public function create(Entity $entity);
		
		/**
		 * @param int
		 */
		public function get($id);
		
		/**
		 * @return mixed
		 */
		public function all();
		
		/**
		 * @param int
		 */
		public function delete($id);
		
		/**
		 * @param int
		 * @param array
		 */
		public function update($id, array $data);
	}