<?php
	
	namespace App\Http\Controllers\Api\V1\Panel\Order;
	
	use App\Contracts\Responses\Panel\DeleteOrderResponse;
	use App\Contracts\Responses\Panel\OrderListResponse;
	use App\Contracts\Responses\Panel\OrderResponse;
	use App\Entities\OrderEntity;
	use App\Http\Controllers\Api\ApiController;
	use App\Http\Requests\Panel\DeleteOrderRequest;
	use App\Http\Requests\Panel\OrderRequest;
	use App\Repositories\OrderRepository;
	
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
			$orderId = $request->get('order_id');
			
			try {
				$order = $this->order->get($orderId)->load('items','user');
				
				$response = new OrderResponse();
				$response->setId($order->id);
				$response->setItems($order->items);
				$response->setUser($order->user);
				$response->setStatus($order->status);
				$response->setPrice($order->price);
				$response->setDiscount($order->discount);
				$response->setData();
				
				return $this->successResponse($response, trans('api.action_is_success'));
			} catch (\Exception $exception) {
				return $this->FailResponse(trans('api.action_is_fail'), 400);
			}
			
		}
		public function update()
		{
			
		}
		
		public function delete(DeleteOrderRequest $request)
		{
			$request->validated();
			
			try {
				$orderId = $request->get('order_id');
				$this->order->delete($orderId);
				
				$response = new DeleteOrderResponse();
				$response->setData();
				
				return $this->successResponse($response);
			} catch (\Exception $exception) {
				return $this->FailResponse(trans('api.action_is_fail'), 400);
			}
		}
		
		public function list()
		{
			try {
				$ventures = $this->order->paginate();
				
				$response = new OrderListResponse();
				$response->setItems($ventures);
				$response->setData();
				
				return $this->successResponse($response);
			} catch (\Exception $exception) {
				return $this->FailResponse(trans('api.action_is_fail'), 400);
			}
		}
	}
