<?php
	
	namespace App\Contracts\Responses\Panel;
	
	
	use App\Contracts\Response\ResponseInterface;
	
	class OrderResponse implements ResponseInterface
	{
		protected $id;
		protected $status;
		protected $user;
		protected $price;
		protected $discount;
		protected $items = [];
		protected $data = [];
		
		/**
		 * @param $items
		 * @return $this
		 */
		public function setItems($items)
		{
			$this->items = $items;
			
			return $this;
		}
		
		/**
		 * @param mixed $id
		 * @return OrderResponse
		 */
		public function setId($id)
		{
			$this->id = $id;
			return $this;
		}
		
		/**
		 * @param mixed $status
		 * @return OrderResponse
		 */
		public function setStatus($status)
		{
			$this->status = $status;
			return $this;
		}
		
		/**
		 * @param mixed $user
		 * @return OrderResponse
		 */
		public function setUser($user)
		{
			$this->user = $user;
			return $this;
		}
		
		/**
		 * @param mixed $price
		 * @return OrderResponse
		 */
		public function setPrice($price)
		{
			$this->price = $price;
			return $this;
		}
		
		/**
		 * @param mixed $discount
		 * @return OrderResponse
		 */
		public function setDiscount($discount)
		{
			$this->discount = $discount;
			return $this;
		}
		
		public function getData()
		{
			return $this->data;
		}
		
		public function setData()
		{
			$this->data = [
				'id'       => $this->id,
				'status'   => $this->status,
				'price'    => $this->price,
				'discount' => $this->discount,
				'items'    => $this->items,
				'user'  => $this->user,
			];
			
			return $this;
		}
	}