<?php
	
	namespace App\Contracts\Responses;
	
	use App\Contracts\Response\ResponseInterface;
	
	class VentureResponse implements ResponseInterface
	{
		protected $id;
		
		protected $title;
		
		protected $description;
		
		protected $color;
		
		protected $cover;
		
		protected $capacity;
		
		protected $unitPrice;
		
		protected $projectReturn;
		
		protected $duration;
		
		protected $free;
		
		protected $impact;
		
		protected $phase;
		
		protected $partner;
		
		protected $keyFact;
		
		protected $data = [];
		
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
			$this->unitPrice = $unitPrice;
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
		
		/**
		 * @param mixed $impact
		 * @return VentureResponse
		 */
		public function setImpact($impact)
		{
			$this->impact = $impact;
			return $this;
		}
		
		/**
		 * @param mixed $phase
		 * @return VentureResponse
		 */
		public function setPhase($phase)
		{
			$this->phase = $phase;
			return $this;
		}
		
		/**
		 * @param mixed $partner
		 * @return VentureResponse
		 */
		public function setPartner($partner)
		{
			$this->partner = $partner;
			return $this;
		}
		
		/**
		 * @param mixed $keyFact
		 * @return VentureResponse
		 */
		public function setKeyFact($keyFact)
		{
			$this->keyFact = $keyFact;
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
				'title'          => $this->title,
				'description'    => $this->description,
				'color'          => $this->color,
				'cover'          => $this->cover,
				'capacity'       => $this->capacity,
				'unit_price'     => $this->unitPrice,
				'project_return' => $this->projectReturn,
				'duration'       => $this->duration,
				'free'           => $this->free,
				'impacts'        => $this->impact,
				'phases'         => $this->phase,
				'partners'       => $this->partner,
				'key_facts'      => $this->keyFact,
			];
			
			return $this;
		}
	}