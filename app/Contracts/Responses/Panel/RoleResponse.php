<?php
	
	namespace App\Contracts\Responses\Panel;
	
	
	use App\Contracts\Response\ResponseInterface;
	
	class RoleResponse implements ResponseInterface
	{
		protected $type;
		
		protected $id;
		protected $data = [];
		
		/**
		 * @param mixed $id
		 * @return RoleResponse
		 */
		public function setId($id)
		{
			$this->id = $id;
			
			return $this;
		}
		
		/**
		 * @param $type
		 * @return $this
		 */
		public function setType($type)
		{
			$this->type = $type;
			
			return $this;
		}
		
		public function getData()
		{
			return $this->data;
		}
		
		public function setData()
		{
			$this->data = [
				'id'   => $this->id,
				'type' => $this->type
			];
			
			return $this;
		}
	}