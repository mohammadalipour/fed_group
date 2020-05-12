<?php
	
	namespace App\Http\Controllers\Api\V1\Panel\User;
	
	use App\Contracts\Responses\Panel\UpdateUserResponse;
	use App\Contracts\Responses\Panel\UserListResponse;
	use App\Contracts\Responses\Panel\UserResponse;
	use App\Entities\UserEntity;
	use App\Http\Controllers\Api\ApiController;
	use App\Http\Requests\panel\AddUserRequest;
	use App\Http\Requests\panel\UpdateUserRequest;
	use App\Http\Requests\Panel\UserRequest;
	use App\Repositories\RoleRepository;
	use App\Repositories\UserRepository;
	
	class UserController extends ApiController
	{
		protected $user;
		
		/**
		 * UserController constructor.
		 * @param UserRepository $repository
		 */
		public function __construct(UserRepository $repository)
		{
			$this->user = $repository;
		}
		
		public function list()
		{
			try {
				$users = $this->user->paginate();
				
				$response = new UserListResponse();
				$response->setItems($users);
				$response->setData();
				
				return $this->successResponse($response);
			} catch (\Exception $exception) {
				return $this->FailResponse(trans('api.action_is_fail'), 400);
			}
		}
		
		public function index(UserRequest $request)
		{
			$request->validated();
			$userId = $request->get('user_id');
			
			try {
				$user = $this->user->get($userId);
				
				$response = new UserResponse();
				$response->setName($user->name);
				$response->setMobileNumber($user->mobile_number);
				$response->setEmail($user->email);
				isset($user->role[0]->type) ? $response->setRole($user->role[0]->type) : '';
				$response->setData();
				
				return $this->successResponse($response, trans('api.action_is_success'));
			} catch (\Exception $exception) {
				return $this->FailResponse(trans('api.action_is_fail'), 400);
			}
		}
		
		public function create(AddUserRequest $request)
		{
			$request->validated();
			try {
				$roleId = $request->get('role_id');
				$name = $request->get('name');
				$email = $request->get('email');
				$mobileNumber = $request->get('mobile_number');
				
				
				$userEntity = new UserEntity();
				$userEntity->setEmail($email)
					->setMobileNumber($mobileNumber)
					->setName($name);
				
				$user = $this->user->create($userEntity);
				
				if ($roleId) {
					$roleRepository = new RoleRepository();
					$role = $roleRepository->get($roleId);
					$user->assignRole($role);
				}
				
				$response = new UpdateUserResponse();
				$response->setData();
				
				return $this->successResponse($response, trans('api.action_is_success'));
			} catch (\Exception $exception) {
				return $this->FailResponse(trans('api.action_is_fail'), 400);
			}
		}
		
		public function update(UpdateUserRequest $request)
		{
			$request->validated();
			$userId = $request->get('user_id');
			try {
				$user = $this->user->get($userId);
				$roleId = $request->get('role_id') ?? $user->role[0]->id;
				$name = $request->get('name') ?? $user->name;
				$email = $request->get('email') ?? $user->email;
				$mobileNumber = $request->get('mobile_number') ?? $user->mobile_number;
				
				$this->user->update(
					$user->id, [
						'name'          => $name,
						'email'         => $email,
						'mobile_number' => $mobileNumber
					]
				);
				
				if ($roleId) {
					$user->role()->sync(['role_id' => $roleId]);
				}
				
				$response = new UpdateUserResponse();
				$response->setData();
				
				return $this->successResponse($response, trans('api.action_is_success'));
			} catch (\Exception $exception) {
				return $this->FailResponse(trans('api.action_is_fail'), 400);
			}
		}
	}
