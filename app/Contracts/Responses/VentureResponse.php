<?php
	
	namespace App\Contracts\Responses;
	
	
	use App\Contracts\Response\ResponseInterface;
	
	class VentureResponse implements ResponseInterface
	{
		protected $title;
		protected $description;
		protected $color;
		protected $cover;
		protected $capacity;
		protected $unit_price;
		protected $projectReturn;
		protected $duration;
		protected $free;
		
		protected $data=[];
		
		/**
		 * @param mixed $title
		 * @return VentureResponse
		 */
		public function setTitle($title)
		{
			$this->title = $title;
			
			return $this;
		}
		
		/**
		 * @param mixed $description
		 * @return VentureResponse
		 */
		public function setDescription($description)
		{
			$this->description = $description;
			
			return $this;
		}
		
		/**
		 * @param mixed $color
		 * @return VentureResponse
		 */
		public function setColor($color)
		{
			$this->color = $color;
			
			return $this;
		}
		
		/**
		 * @param mixed $cover
		 * @return VentureResponse
		 */
		public function setCover($cover)
		{
			$this->cover = $cover;
			return $this;
		}
		
		/**
		 * @param mixed $capacity
		 * @return VentureResponse
		 */
		public function setCapacity($capacity)
		{
			$this->capacity = $capacity;
			
			return $this;
		}
		
		/**
		 * @param mixed $unitPrice
		 * @return VentureResponse
		 */
		public function setUnitPrice($unitPrice)
		{
			$this->unit_price = $unitPrice;
			
			return $this;
		}
		
		/**
		 * @param mixed $projectReturn
		 * @return VentureResponse
		 */
		public function setProjectReturn($projectReturn)
		{
			$this->projectReturn = $projectReturn;
			return $this;
		}
		
		/**
		 * @param mixed $duration
		 * @return VentureResponse
		 */
		public function setDuration($duration)
		{
			$this->duration = $duration;
			return $this;
		}
		
		/**
		 * @param mixed $free
		 * @return VentureResponse
		 */
		public function setFree($free)
		{
			$this->free = $free;
			return $this;
		}
		
		public function setData()
		{
			// TODO: Implement setData() method.
		}
		
		public function getData()
		{
			// TODO: Implement getData() method.
		}
		
		/**
		 * @return string
		 */
		public function getItems(): string
		{
			return $this->items;
		}
		
		/**
		 * @param $items
		 * @return $this
		 */
		public function setItems($items)
		{
			$this->items = $items;
			
			return $this;
		}
	}