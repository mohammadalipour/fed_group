<?php
	
	namespace App\Contracts\Responses\Panel;
	
	
	use App\Contracts\Response\ResponseInterface;
	
	class RoleListResponse implements ResponseInterface
	{
		protected $data=[];
		
		protected $items;
		
		
		/**
		 * @param $items
		 * @return $this
		 */
		public function setItems($items)
		{
			$this->items = $items;
			
			return $this;
		}
		
		public function setData()
		{
			$this->data = [
				$this->items
			];
			
			return $this;
		}
		
		public function getData()
		{
			return $this->data;
		}
	}