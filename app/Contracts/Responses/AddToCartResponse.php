<?php
	
	namespace App\Contracts\Responses;
	
	
	use App\Contracts\Response\ResponseInterface;
	
	class AddToCartResponse implements ResponseInterface
	{
		protected $data = [];
		
		public function getData()
		{
			return $this->data;
		}
		
		public function setData()
		{
			$this->data = [];
			
			return $this;
		}
	}