<?php
	
	namespace App\Contracts\Responses;
	
	
	use App\Contracts\Response\ResponseInterface;
	
	class UserReferralResponse implements ResponseInterface
	{
		protected $url;
		
		protected $data = [];
		
		/**
		 * @param mixed $url
		 * @return UserReferralResponse
		 */
		public function setUrl($url)
		{
			$this->url = $url;
			
			return $this;
		}
		
		public function getData()
		{
			return $this->data;
		}
		
		public function setData()
		{
			$this->data = [
				'url' => $this->url
			];
		}
	}