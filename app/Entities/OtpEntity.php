<?php
	
	namespace App\Entities;
	
	
	class OtpEntity extends Entity
	{
		protected $mobileNumber;
		protected $code;
		protected $expiredAt;
		
		/**
		 * @return mixed
		 */
		public function getExpiredAt()
		{
			return $this->expiredAt;
		}
		
		/**
		 * @param $expiredAt
		 * @return $this
		 */
		public function setExpiredAt($expiredAt)
		{
			$this->expiredAt = $expiredAt;
			
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
		 * @param $mobileNumber
		 * @return $this
		 */
		public function setMobileNumber($mobileNumber)
		{
			$this->mobileNumber = $mobileNumber;
			
			return $this;
		}
		
		/**
		 * @return mixed
		 */
		public function getCode()
		{
			return $this->code;
		}
		
		/**
		 * @param $code
		 * @return $this
		 */
		public function setCode($code)
		{
			$this->code = $code;
			
			return $this;
		}
	}