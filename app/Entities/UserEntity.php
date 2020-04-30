<?php
	
	namespace App\Entities;
	
	
	class UserEntity extends Entity
	{
		/**
		 * @var int
		 */
		protected $id;
		
		/**
		 * @var string
		 */
		protected $name;
		
		/**
		 * @var string
		 */
		protected $email;
		
		/**
		 * @var string
		 */
		protected $password;
		
		/**
		 * @var string
		 */
		protected $mobileNumber;
		
		/**
		 * @return string
		 */
		public function getMobileNumber(): string
		{
			return $this->mobileNumber;
		}
		
		/**
		 * @param string $mobileNumber
		 * @return $this
		 */
		public function setMobileNumber(string $mobileNumber)
		{
			$this->mobileNumber = $mobileNumber;
			
			return $this;
		}
		
		
		public function getId()
		{
			return $this->id;
		}
		
		public function setId(int $id)
		{
			$this->id = $id;
			
			return $this;
		}
		
		public function getName()
		{
			return $this->name;
		}
		
		public function setName(string $name)
		{
			$this->name = $name;
			
			return $this;
		}
		
		public function getEmail()
		{
			return $this->email;
		}
		
		public function setEmail(?string $email)
		{
			$this->email = $email;
			
			return $this;
		}
		
		public function getPassword()
		{
			return $this->password;
		}
		
		public function setPassword(string $password)
		{
			$this->password = $password;
			
			return $this;
		}
	}
