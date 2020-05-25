<?php
	
	namespace App\Contracts\Responses;
	
	
	use App\Contracts\Response\ResponseInterface;
	
	class OrderListResponse implements ResponseInterface
	{
		protected $data = [];
		
		protected $items;
		
		/**
		 * @param array $items
		 * @return $this
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
				$this->items
			];
			
			return $this;
		}
	}