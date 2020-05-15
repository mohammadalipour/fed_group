<?php
	
	namespace App\Entities;
	
	
	class OrderEntity extends Entity
	{
		const PENDING_STATUS = 'pending_status';
		const FINISHED_STATUS = 'finished_status';
		
		const ORDER_TYPE = [
			self::PENDING_STATUS,
			self::FINISHED_STATUS
		];
		
		protected $status = [];
		protected $userId;
		protected $price;
		protected $discount;
		
		/**
		 * @return array
		 */
		public function getStatus(): array
		{
			return $this->status;
		}
		
		/**
		 * @param array $status
		 * @return OrderEntity
		 */
		public function setStatus(array $status)
		{
			$this->status = $status;
			return $this;
		}
		
		/**
		 * @return mixed
		 */
		public function getUserId()
		{
			return $this->userId;
		}
		
		/**
		 * @param mixed $userId
		 * @return OrderEntity
		 */
		public function setUserId($userId)
		{
			$this->userId = $userId;
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
		 * @return OrderEntity
		 */
		public function setPrice($price)
		{
			$this->price = $price;
			return $this;
		}
		
		/**
		 * @return mixed
		 */
		public function getDiscount()
		{
			return $this->discount;
		}
		
		/**
		 * @param mixed $discount
		 * @return OrderEntity
		 */
		public function setDiscount($discount)
		{
			$this->discount = $discount;
			return $this;
		}
		
	}