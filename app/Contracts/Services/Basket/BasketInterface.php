<?php
	
	namespace App\Contracts\Services\Basket;
	
	
	interface BasketInterface
	{
		public function add(int $id, int $userId, int $count);
	}