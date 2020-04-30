<?php
	
	namespace App\Contracts\Services\Guide;
	
	
	class Guide implements Guidance
	{
		protected $flow;
		
		/**
		 * Guide constructor.
		 * @param $flow
		 */
		public function __construct($flow)
		{
			$this->flow = $flow;
		}
		
		
		public function handle()
		{
			// TODO: Implement handle() method.
		}
	}