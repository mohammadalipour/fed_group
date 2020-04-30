<?php
	namespace App\Contracts\Services\Pigeon\Providers;
	
	
	abstract class AbstractPigeonProvider
	{
		protected $key;
		protected $sender;
		protected $receptor;
		
		/**
		 * @return mixed
		 */
		public function getReceptor()
		{
			return $this->receptor;
		}
		
		/**
		 * @param $receptor
		 * @return $this
		 */
		public function setReceptor($receptor)
		{
			$this->receptor = $receptor;
			
			return $this;
		}
		
	}