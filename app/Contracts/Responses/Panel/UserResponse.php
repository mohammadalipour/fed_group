<?php
	
	namespace App\Contracts\Responses\Panel;
	
	
	use App\Contracts\Response\ResponseInterface;
	
	class UserResponse implements ResponseInterface
	{
		protected $id;
		
		protected $name;
		
		protected $email;
		
		protected $mobileNumber;
		
		protected $role;
		
		protected $data = [];
		
		/**
		 * @param mixed $id
		 * @return UserResponse
		 */
		public function setId($id)
		{
			$this->id = $id;
			return $this;
		}
		
		/**
		 * @param mixed $name
		 * @return UserResponse
		 */
		public function setName($name)
		{
			$this->name = $name;
			return $this;
		}
		
		/**
		 * @param mixed $email
		 * @return UserResponse
		 */
		public function setEmail($email)
		{
			$this->email = $email;
			return $this;
		}
		
		/**
		 * @param mixed $mobileNumber
		 * @return UserResponse
		 */
		public function setMobileNumber($mobileNumber)
		{
			$this->mobileNumber = $mobileNumber;
			return $this;
		}
		
		/**
		 * @param mixed $role
		 * @return UserResponse
		 */
		public function setRole($role)
		{
			$this->role = $role;
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
				'emil'          => $this->email,
				'role'          => $this->role
			];
			
			return $this;
		}
	}