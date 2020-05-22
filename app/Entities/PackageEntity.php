<?php
	
	namespace App\Repositories;
	
	
	use App\Entities\Entity;
	
	class PackageEntity extends Entity
	{
		protected $ventureId;
		protected $title;
		protected $description;
		protected $count;
		protected $price;
		
		/**
		 * @return mixed
		 */
		public function getVentureId()
		{
			return $this->ventureId;
		}
		
		/**
		 * @param mixed $ventureId
		 * @return PackageEntity
		 */
		public function setVentureId($ventureId)
		{
			$this->ventureId = $ventureId;
			return $this;
		}
		
		/**
		 * @return mixed
		 */
		public function getTitle()
		{
			return $this->title;
		}
		
		/**
		 * @param mixed $title
		 * @return PackageEntity
		 */
		public function setTitle($title)
		{
			$this->title = $title;
			return $this;
		}
		
		/**
		 * @return mixed
		 */
		public function getDescription()
		{
			return $this->description;
		}
		
		/**
		 * @param mixed $description
		 * @return PackageEntity
		 */
		public function setDescription($description)
		{
			$this->description = $description;
			return $this;
		}
		
		/**
		 * @return mixed
		 */
		public function getCount()
		{
			return $this->count;
		}
		
		/**
		 * @param mixed $count
		 * @return PackageEntity
		 */
		public function setCount($count)
		{
			$this->count = $count;
			return $this;
		}
		
		/**
		 * @return mixed
		 */
		public function getPrice()
		{
			return $this->price;
		}
		
		/**
		 * @param mixed $price
		 * @return PackageEntity
		 */
		public function setPrice($price)
		{
			$this->price = $price;
			return $this;
		}
	}