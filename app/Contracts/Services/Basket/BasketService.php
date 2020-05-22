<?php
	
	namespace App\Contracts\Services\Basket;
	
	
	use App\Contracts\Services\Basket\Types\PackageBasket;
	use App\Contracts\Services\Basket\Types\VentureBasket;
	
	class BasketService implements BasketInterface
	{
		protected $service;
		
		/**
		 * BasketService constructor.
		 * @param string $type
		 */
		public function __construct(string $type)
		{
			switch ($type) {
				case 'package':
					$this->service = new PackageBasket();
					break;
				case 'venture':
					$this->service = new VentureBasket();
					break;
				default:
					break;
			}
		}
		
		public function add(int $id, int $userId, int $count)
		{
			return $this->service->add($id, $userId, $count);
		}
	}