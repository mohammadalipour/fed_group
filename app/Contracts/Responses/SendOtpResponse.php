<?php
	
	namespace App\Contracts\Responses;
	
	
	use App\Contracts\Response\ResponseInterface;
	
	class SendOtpResponse implements ResponseInterface
	{
		protected $data = [];
		
		protected $mobileNumber;
		
		/**
		 * @return mixed
		 */
		public function getMobileNumber()
		{
			return $this->mobileNumber;
		}
		
		/**
		 * @param mixed $mobileNumber
		 * @return SendOtpResponse
		 */
		public function setMobileNumber($mobileNumber)
		{
			$this->mobileNumber = $mobileNumber;
			
			return $this;
		}
		
		public function getData()
		{
			return $this->data;
		}
		
		public function setData()
		{
			$this->data = [
				'mobile_number' => $this->mobileNumber
			];
		}
	}