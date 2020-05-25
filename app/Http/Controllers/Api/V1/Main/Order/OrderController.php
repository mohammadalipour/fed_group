<?php
	
	namespace App\Http\Controllers\Api\V1\Main\Order;
	
	use App\Contracts\Responses\OrderListResponse;
	use App\Contracts\Responses\OrderResponse;
	use App\Entities\OrderEntity;
	use App\Http\Controllers\Api\ApiController;
	use App\Http\Requests\OrderRequest;
	use App\Repositories\OrderRepository;
	use App\Repositories\UserRepository;
	use Tymon\JWTAuth\Facades\JWTAuth;
	
	
	class OrderController extends ApiController
	{
		protected $order;
		
		/**
		 * OrderController constructor.
		 * @param OrderEntity $repository
		 */
		public function __construct(OrderRepository $repository)
		{
			$this->order = $repository;
		}
		
		public function index(OrderRequest $request)
		{
			$request->validated();
			try {
				$orderId = $request->get('order_id');
				$order = $this->order->get($orderId)->load('items.venture','items.package');
				
				$response = new OrderResponse();
				$response->setId($order->id);
				$response->setItems($order->items);
				$response->setStatus($order->status);
				$response->setPrice($order->price);
				$response->setDiscount($order->discount);
				$response->setData();
				
				return $this->successResponse($response);
			} catch (\Exception $exception) {
				return $this->FailResponse(trans('api.action_is_fail'), 400);
			}
		}
		
		public function list()
		{
			try {
				$user = JWTAuth::parseToken()->authenticate();
				
				$userRepository = new UserRepository();
				$orders = $userRepository->get($user->id)->order()->paginate()->load('items.venture', 'items.package');
				
				$response = new OrderListResponse();
				$response->setItems($orders);
				$response->setData();
				
				return $this->successResponse($response, trans('api.action_is_success'));
			} catch (\Exception $exception) {
				return $this->FailResponse(trans('api.action_is_fail'), 400);
			}
		}
	}
