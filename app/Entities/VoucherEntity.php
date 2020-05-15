<?php
	
	namespace App\Repositories;
	
	
	use App\Entities\Entity;
	
	class VoucherEntity extends Entity
	{
		protected $title;
		protected $capacity;
		protected $maxOff;
		protected $expiredAt;
		
		/**
		 * @return mixed
		 */
		public function getTitle()
		{
			return $this->title;
		}
		
		/**
		 * @param mixed $title
		 * @return VoucherEntity
		 */
		public function setTitle($title)
		{
			$this->title = $title;
			return $this;
		}
		
		/**
		 * @return mixed
		 */
		public function getCapacity()
		{
			return $this->capacity;
		}
		
		/**
		 * @param mixed $capacity
		 * @return VoucherEntity
		 */
		public function setCapacity($capacity)
		{
			$this->capacity = $capacity;
			return $this;
		}
		
		/**
		 * @return mixed
		 */
		public function getMaxOff()
		{
			return $this->maxOff;
		}
		
		/**
		 * @param mixed $maxOff
		 * @return VoucherEntity
		 */
		public function setMaxOff($maxOff)
		{
			$this->maxOff = $maxOff;
			return $this;
		}
		
		/**
		 * @return mixed
		 */
		public function getExpiredAt()
		{
			return $this->expiredAt;
		}
		
		/**
		 * @param mixed $expiredAt
		 * @return VoucherEntity
		 */
		public function setExpiredAt($expiredAt)
		{
			$this->expiredAt = $expiredAt;
			return $this;
		}
	}