<?php
	
	namespace App\Contracts\Responses;
	
	
	use App\Contracts\Response\ResponseInterface;
	
	class PageResponse implements ResponseInterface
	{
		protected $data = [];
		
		protected $content;
		protected $type;
		
		public function getData()
		{
			return $this->data;
		}
		
		public function setData()
		{
			$this->data = [
				'content' => $this->getContent(),
				'type'    => $this->getType()
			];
			
			return $this;
		}
		
		/**
		 * @return mixed
		 */
		public function getContent()
		{
			return $this->content;
		}
		
		/**
		 * @param mixed $content
		 * @return PageResponse
		 */
		public function setContent($content)
		{
			$this->content = $content;
			
			return $this;
		}
		
		/**
		 * @return mixed
		 */
		public function getType()
		{
			return $this->type;
		}
		
		/**
		 * @param mixed $type
		 * @return PageResponse
		 */
		public function setType($type)
		{
			$this->type = $type;
			
			return $this;
		}
	}