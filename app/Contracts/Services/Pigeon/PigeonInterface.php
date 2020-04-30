<?php
	
	namespace App\Contracts\Services\Pigeon;
	
	interface PigeonInterface
	{
		public function send(string $message):bool ;
	}