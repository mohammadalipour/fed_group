<?php
	
	namespace App\Http\Controllers\Api\V1\Main\Cart;
	
	use App\Contracts\Responses\AddToCartResponse;
	use App\Contracts\Responses\CartResponse;
	use App\Contracts\Services\Basket\BasketService;
	use App\Http\Controllers\Api\ApiController;
	use App\Http\Requests\AddToCartRequest;
    use App\Http\Requests\RemoveFromCartRequest;
    use App\Repositories\CartRepository;
	use App\Repositories\UserRepository;
	use Tymon\JWTAuth\Facades\JWTAuth;
	
	class CartController extends ApiController
	{
		protected $cart;
		protected $userId;
		
		/**
		 * VentureController constructor.
		 * @param CartRepository $repository
		 */
		public function __construct(CartRepository $repository)
		{
			$this->cart = $repository;
		}
		
		public function index()
		{
			try {
				$user = JWTAuth::parseToken()->authenticate();
				
				$userRepository = new UserRepository();
				$carts = $userRepository->get($user->id)->cart()->get()->load('venture','package');
				$response = new CartResponse();
				$response->setItems($carts);
				$response->setData();
				
				return $this->successResponse($response);
			} catch (\Exception $exception) {
				return $this->FailResponse(trans('api.action_is_fail'), 400);
			}
		}
		
		public function add(AddToCartRequest $request)
		{
			$request->validated();
			
			try {
				$basketService = new BasketService();
                $user = JWTAuth::parseToken()->authenticate();

				$usageId = $request->get('usage_id');
				$count = $request->get('count');
				
				$basketService
                    ->setType($request->get('type'))
                    ->add($usageId, $user->id, $count);
				
				$response = new AddToCartResponse();
				$response->setData();
				
				return $this->successResponse($response, trans('api.action_is_success'));
			} catch (\Exception $exception) {
				return $this->FailResponse(trans('api.action_is_fail'), 400);
			}
		}

        public function remove(RemoveFromCartRequest $request)
        {
            $request->validated();

            try {
                $basketService = new BasketService();
                $cartId = $request->get('cart_id');
                $basketService->remove($cartId);

                $response = new AddToCartResponse();
                $response->setData();
                return $this->successResponse($response, trans('api.action_is_success'));
            }catch (\Exception $exception){
                return $this->FailResponse(trans('api.action_is_fail'), 400);
            }
		}
	}
