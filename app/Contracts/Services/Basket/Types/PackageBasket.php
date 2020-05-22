<?php
	
	namespace App\Contracts\Services\Basket\Types;
	
	
	use App\Contracts\Services\Basket\BasketInterface;
	use App\Repositories\PackageRepository;
	
	class PackageBasket implements BasketInterface
	{
		protected $package;
		protected $userId;
		protected $count;
		
		/**
		 * VentureBasket constructor.
		 * @param $venture
		 */
		public function __construct()
		{
			$this->package = new PackageRepository();
		}
		
		public function add(int $id, int $userId, int $count)
		{
			try {
				$venture = $this->package->get($id);
				return $this->package->addToCard($venture, $userId, $count);
			} catch (\Exception $exception) {
				return $exception->getMessage();
			}
			
		}
	}