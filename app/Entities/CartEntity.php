<?php
	
	namespace App\Repositories;
	
	
	use App\Entities\Entity;
	
	class CartEntity extends Entity
	{
		protected $userId;
		protected $usageId;
		protected $usageType;
		protected $count;
		protected $expiredAt;
		
		/**
		 * @return mixed
		 */
		public function getUserId()
		{
			return $this->userId;
		}
		
		/**
		 * @param mixed $userId
		 * @return CartEntity
		 */
		public function setUserId($userId)
		{
			$this->userId = $userId;
			return $this;
		}
		
		/**
		 * @return mixed
		 */
		public function getUsageId()
		{
			return $this->usageId;
		}
		
		/**
		 * @param mixed $usageId
		 * @return CartEntity
		 */
		public function setUsageId($usageId)
		{
			$this->usageId = $usageId;
			return $this;
		}
		
		/**
		 * @return mixed
		 */
		public function getUsageType()
		{
			return $this->usageType;
		}
		
		/**
		 * @param mixed $usageType
		 * @return CartEntity
		 */
		public function setUsageType($usageType)
		{
			$this->usageType = $usageType;
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
		 * @return CartEntity
		 */
		public function setCount($count)
		{
			$this->count = $count;
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
		 * @return CartEntity
		 */
		public function setExpiredAt($expiredAt)
		{
			$this->expiredAt = $expiredAt;
			
			return $this;
		}
	}