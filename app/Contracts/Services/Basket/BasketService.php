<?php
	
	namespace App\Contracts\Services\Basket;
	
	
	use App\Contracts\Services\Basket\Types\PackageBasket;
	use App\Contracts\Services\Basket\Types\VentureBasket;
    use App\Repositories\CartRepository;

    class BasketService implements BasketInterface
	{
		protected $service;


        /**
         * @param mixed $type
         * @return BasketService
         */
        public function setType($type)
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

            return $this;
        }
		
		public function add(int $id, int $userId, int $count)
		{
			return $this->service->add($id, $userId, $count);
		}

        public function remove(int $cartId)
        {
            try{
                $cartRepository = new CartRepository();
                $cartRepository->delete($cartId);

                return true;
            }catch (\Exception $exception){
                return false;
            }
		}
	}