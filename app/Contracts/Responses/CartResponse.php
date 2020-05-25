<?php
	
	namespace App\Contracts\Responses;
	
	
	use App\Contracts\Response\ResponseInterface;
	
	class CartResponse implements ResponseInterface
	{
		protected $data = [];
		protected $items;
		
		/**
		 * @param mixed $items
		 * @return CartResponse
		 */
		public function setItems($items)
		{
			$this->items = $items;
			return $this;
		}
		
		
		public function getData()
		{
			return $this->data;
		}
		
		public function setData()
		{
			$this->data = [
				'items' => $this->items
			];
			
			return $this;
		}
	}