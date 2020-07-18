<?php
	
	namespace App\Contracts\Services\Pigeon;
	
	
	class Pigeon implements PigeonInterface
	{
		protected $provider;
		
		/**
		 * Pigeon constructor.
		 * @param PigeonInterface $provider
		 */
		public function __construct(PigeonInterface $provider)
		{
			$this->provider = $provider;
		}
		
		/**
		 * @param string $message
		 * @return bool
		 */
		public function send(string $message):bool
		{
		    return true;
			return $this->provider->send($message);
		}
	}