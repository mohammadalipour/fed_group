<?php
	
	namespace App\Contracts\Responses;
	
	
	use App\Contracts\Response\ResponseInterface;
	
	class VerifyOtpResponse implements ResponseInterface
	{
		/**
		 * @var bool
		 */
		protected $isUserRegistered = false;
		
		/**
		 * @var array
		 */
		protected $user = [];
		
		
		protected $data = [];
		
		protected $token='';
		
		public function getData()
		{
			return $this->data;
		}
		
		public function setData()
		{
			$this->data = [
				'is_user_registered' => $this->getIsUserRegistered(),
				'user'               => $this->getUser(),
				'token'              => $this->getToken()
			];
		}
		
		/**
		 * @return mixed
		 */
		public function getIsUserRegistered()
		{
			return $this->isUserRegistered;
		}
		
		/**
		 * @param $isUserRegistered
		 * @return $this
		 */
		public function setIsUserRegistered(bool $isUserRegistered = false)
		{
			$this->isUserRegistered = $isUserRegistered;
			
			return $this;
		}
		
		/**
		 * @return array
		 */
		public function getUser(): array
		{
			return $this->user;
		}
		
		/**
		 * @param array $user
		 * @return $this
		 */
		public function setUser(?array $user = [])
		{
			$this->user = $user;
			
			return $this;
		}
		
		/**
		 * @return mixed
		 */
		public function getToken()
		{
			return $this->token;
		}
		
		/**
		 * @param $token
		 * @return $this
		 */
		public function setToken(?string $token = '')
		{
			$this->token = $token;
			
			return $this;
		}
	}