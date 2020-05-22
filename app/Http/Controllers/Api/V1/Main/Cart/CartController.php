<?php
	
	namespace App\Http\Controllers\Api\V1\Main\Cart;
	
	use App\Contracts\Responses\AddToCartResponse;
	use App\Contracts\Services\Basket\BasketService;
	use App\Http\Controllers\Api\ApiController;
	use App\Http\Requests\AddToCartRequest;
	use App\Repositories\CartEntity;
	use App\Repositories\CartRepository;
	
	class CartController extends ApiController
	{
		protected $cart;
		
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
		
		}
		
		public function add(AddToCartRequest $request)
		{
			$request->validated();
			
			try {
				$basketService= new BasketService($request->get('type'));
				
				$userId = $request->get('user_id');
				$usageId = $request->get('usage_id');
				$count = $request->get('count');
				
				$basketService->add($usageId,$userId,$count);

				$response = new AddToCartResponse();
				$response->setData();
				
				return $this->successResponse($response, trans('api.action_is_success'));
			} catch (\Exception $exception) {
				return $this->FailResponse(trans('api.action_is_fail'), 400);
			}
		}
	}
