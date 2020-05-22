<?php
	
	namespace App\Contracts\Services\Basket\Types;
	
	
	use App\Contracts\Services\Basket\BasketInterface;
	use App\Repositories\VentureRepository;
	
	class VentureBasket implements BasketInterface
	{
		protected $venture;
		protected $userId;
		protected $count;
		
		/**
		 * VentureBasket constructor.
		 * @param $venture
		 */
		public function __construct()
		{
			$this->venture = new VentureRepository();
		}
		
		public function add(int $id, int $userId, int $count)
		{
			try {
				$venture = $this->venture->get($id);
				return $this->venture->addToCard($venture, $userId, $count);
			} catch (\Exception $exception) {
				throw new \Exception($exception->getMessage());
			}
			
		}
	}