<?php
	
	namespace App\Contracts\Responses;
	
	
	use App\Contracts\Response\ResponseInterface;
	
	class UserProfileResponse implements ResponseInterface
	{
		protected $name;
		
		protected $mobileNumber;
		
		protected $email;
		
		protected $data = [];
		
		/**
		 * @return mixed
		 */
		public function getName()
		{
			return $this->name;
		}
		
		/**
		 * @param mixed $name
		 * @return UserProfileResponse
		 */
		public function setName($name)
		{
			$this->name = $name;
			
			return $this;
		}
		
		/**
		 * @return mixed
		 */
		public function getMobileNumber()
		{
			return $this->mobileNumber;
		}
		
		/**
		 * @param mixed $mobileNumber
		 * @return UserProfileResponse
		 */
		public function setMobileNumber($mobileNumber)
		{
			$this->mobileNumber = $mobileNumber;
			
			return $this;
		}
		
		/**
		 * @return mixed
		 */
		public function getEmail()
		{
			return $this->email;
		}
		
		/**
		 * @param mixed $email
		 * @return UserProfileResponse
		 */
		public function setEmail($email)
		{
			$this->email = $email;
			
			return $this;
		}
		
		public function getData()
		{
			return $this->data;
		}
		
		public function setData()
		{
			$this->data = [
				'name'          => $this->name,
				'mobile_number' => $this->mobileNumber,
				'email'         => $this->email
			];
		}
	}