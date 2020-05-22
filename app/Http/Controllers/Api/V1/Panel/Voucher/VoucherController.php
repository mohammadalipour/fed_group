<?php
	
	namespace App\Http\Controllers\Api\V1\Panel\Voucher;
	
	use App\Contracts\Responses\Panel\AddVoucherResponse;
	use App\Contracts\Responses\Panel\UpdateVoucherResponse;
	use App\Contracts\Responses\Panel\VoucherListResponse;
	use App\Contracts\Responses\Panel\VoucherResponse;
	use App\Http\Controllers\Api\ApiController;
	use App\Http\Requests\Panel\AddVoucherRequest;
	use App\Http\Requests\Panel\UpdateVoucherRequest;
	use App\Http\Requests\Panel\VoucherRequest;
	use App\Repositories\UserRepository;
	use App\Repositories\VoucherEntity;
	use App\Repositories\VoucherRepository;
	
	class VoucherController extends ApiController
	{
		protected $voucher;
		
		/**
		 * UserController constructor.
		 * @param VoucherRepository $repository
		 */
		public function __construct(VoucherRepository $repository)
		{
			$this->voucher = $repository;
		}
		
		public function index(VoucherRequest $request)
		{
			$request->validated();
			$voucherId = $request->get('voucher_id');
			
			try {
				$voucher = $this->voucher->get($voucherId)->load('users');
				
				$response = new VoucherResponse();
				$response->setId($voucher->id);
				$response->setTitle($voucher->title);
				$response->setCapacity($voucher->capacity);
				$response->setMaxOff($voucher->max_off);
				$response->setExpiredAt($voucher->expired_at);
				$response->setUsers($voucher->users);
				
				$response->setData();
				
				return $this->successResponse($response, trans('api.action_is_success'));
			} catch (\Exception $exception) {
				return $this->FailResponse(trans('api.action_is_fail'), 400);
			}
		}
		
		public function list()
		{
			try {
				$users = $this->voucher->paginate();
				
				$response = new VoucherListResponse();
				$response->setItems($users);
				$response->setData();
				
				return $this->successResponse($response);
			} catch (\Exception $exception) {
				return $this->FailResponse(trans('api.action_is_fail'), 400);
			}
		}
		
		public function create(AddVoucherRequest $request)
		{
			$request->validated();
			
			try {
				$title = $request->get('title');
				$capacity = $request->get('capacity');
				$maxOff = $request->get('max_off');
				$expiredAt = $request->get('expired_at');
				$userIds = json_decode($request->get('user_id'));
				
				$voucherEntity = new VoucherEntity();
				$voucherEntity->setTitle($title)
					->setCapacity($capacity)
					->setMaxOff($maxOff)
					->setExpiredAt($expiredAt);
				
				$voucher = $this->voucher->create($voucherEntity);
				
				if ($userIds) {
					foreach ($userIds as $userId) {
						$userRepository = new UserRepository();
						$user = $userRepository->get($userId);
						$voucher->users()->save($user);
					}
				}
				
				$response = new AddVoucherResponse();
				$response->setData();
				
				return $this->successResponse($response, trans('api.action_is_success'));
			} catch (\Exception $exception) {
				return $this->FailResponse(trans('api.action_is_fail'), 400);
			}
		}
		
		public function update(UpdateVoucherRequest $request)
		{
			$request->validated();
			
			try {
				$voucherId = $request->get('voucher_id');
				
				$voucher = $this->voucher->get($voucherId);
				
				$title = $request->get('title') ?? $voucher->title;
				$capacity = $request->get('capacity') ?? $voucher->capacity;
				$maxOff = $request->get('max_off') ?? $voucher->max_off;
				$expiredAt = $request->get('expired_at') ?? $voucher->expired_at;
				$userIds = json_decode($request->get('user_id'));
				
				$this->voucher->update(
					$voucher->id, [
						'title'      => $title,
						'capacity'   => $capacity,
						'max_off'    => $maxOff,
						'expired_at' => $expiredAt
					]
				);
				
				if ($request->get('user_id')) {
					$voucher->users()->detach();
					foreach ($userIds as $userId) {
						$userRepository = new UserRepository();
						$user = $userRepository->get($userId);
						$voucher->users()->save($user);
					}
				}
				
				$response = new UpdateVoucherResponse();
				$response->setData();
				
				return $this->successResponse($response, trans('api.action_is_success'));
			} catch (\Exception $exception) {
				return $this->FailResponse(trans('api.action_is_fail'), 400);
			}
		}
	}
