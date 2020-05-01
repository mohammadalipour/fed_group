<?php
	
	namespace App\Entities;
	
	
	class VentureEntity extends Entity
	{
		/**
		 * @var string
		 */
		protected $title;
		/**
		 * @var string
		 */
		protected $description;
		/**
		 * @var string
		 */
		protected $color;
		/**
		 * @var string
		 */
		protected $cover;
		/**
		 * @var integer
		 */
		protected $capacity;
		/**
		 * @var integer
		 */
		protected $unit_price;
		/**
		 * @var integer
		 */
		protected $projectReturn;
		/**
		 * @var integer
		 */
		protected $duration;
		/**
		 * @var integer
		 */
		protected $free;
		
		/**
		 * @return string
		 */
		public function getTitle(): string
		{
			return $this->title;
		}
		
		/**
		 * @param string $title
		 * @return VentureEntity
		 */
		public function setTitle(string $title)
		{
			$this->title = $title;
			
			return $this;
		}
		
		/**
		 * @return string
		 */
		public function getDescription(): string
		{
			return $this->description;
		}
		
		/**
		 * @param string $description
		 * @return VentureEntity
		 */
		public function setDescription(string $description)
		{
			$this->description = $description;
			
			return $this;
		}
		
		/**
		 * @return string
		 */
		public function getColor(): string
		{
			return $this->color;
		}
		
		/**
		 * @param string $color
		 * @return VentureEntity
		 */
		public function setColor(string $color)
		{
			$this->color = $color;
			
			return $this;
		}
		
		/**
		 * @return string
		 */
		public function getCover(): string
		{
			return $this->cover;
		}
		
		/**
		 * @param string $cover
		 * @return VentureEntity
		 */
		public function setCover(string $cover)
		{
			$this->cover = $cover;
			
			return $this;
		}
		
		/**
		 * @return int
		 */
		public function getCapacity(): int
		{
			return $this->capacity;
		}
		
		/**
		 * @param int $capacity
		 * @return VentureEntity
		 */
		public function setCapacity(int $capacity)
		{
			$this->capacity = $capacity;
			
			return $this;
		}
		
		/**
		 * @return int
		 */
		public function getUnitPrice(): int
		{
			return $this->unit_price;
		}
		
		/**
		 * @param int $unit_price
		 * @return VentureEntity
		 */
		public function setUnitPrice(int $unit_price)
		{
			$this->unit_price = $unit_price;
			
			return $this;
		}
		
		/**
		 * @return int
		 */
		public function getProjectReturn(): int
		{
			return $this->projectReturn;
		}
		
		/**
		 * @param int $projectReturn
		 * @return VentureEntity
		 */
		public function setProjectReturn(int $projectReturn)
		{
			$this->projectReturn = $projectReturn;
			
			return $this;
		}
		
		/**
		 * @return int
		 */
		public function getDuration(): int
		{
			return $this->duration;
		}
		
		/**
		 * @param int $duration
		 * @return VentureEntity
		 */
		public function setDuration(int $duration)
		{
			$this->duration = $duration;
			
			return $this;
		}
		
		/**
		 * @return int
		 */
		public function getFree(): int
		{
			return $this->free;
		}
		
		/**
		 * @param int $free
		 * @return VentureEntity
		 */
		public function setFree(int $free)
		{
			$this->free = $free;
			
			return $this;
		}
	}