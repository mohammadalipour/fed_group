<?php
	
	namespace App\Contracts\Responses\Panel;
	
	
	use App\Contracts\Response\ResponseInterface;
	
	class VoucherResponse implements ResponseInterface
	{
		protected $id;
		protected $title;
		protected $users = [];
		protected $capacity;
		protected $maxOff;
		protected $expiredAt;
		protected $data = [];
		
		/**
		 * @param mixed $title
		 * @return VoucherResponse
		 */
		public function setTitle($title)
		{
			$this->title = $title;
			return $this;
		}
		
		/**
		 * @param mixed $users
		 * @return VoucherResponse
		 */
		public function setUsers($users)
		{
			$this->users = $users;
			return $this;
		}
		
		/**
		 * @param mixed $capacity
		 * @return VoucherResponse
		 */
		public function setCapacity($capacity)
		{
			$this->capacity = $capacity;
			return $this;
		}
		
		/**
		 * @param mixed $maxOff
		 * @return VoucherResponse
		 */
		public function setMaxOff($maxOff)
		{
			$this->maxOff = $maxOff;
			return $this;
		}
		
		/**
		 * @param mixed $expiredAt
		 * @return VoucherResponse
		 */
		public function setExpiredAt($expiredAt)
		{
			$this->expiredAt = $expiredAt;
			return $this;
		}
		
		/**
		 * @param $id
		 * @return $this
		 */
		public function setId($id)
		{
			$this->id = $id;
			
			return $this;
		}
		
		
		public function getData()
		{
			return $this->data;
		}
		
		public function setData()
		{
			$this->data = [
				'id'         => $this->id,
				'title'      => $this->title,
				'capacity'   => $this->capacity,
				'max_off'    => $this->maxOff,
				'expired_at' => $this->expiredAt,
				'users'      => $this->users,
			];
			
			return $this;
		}
	}