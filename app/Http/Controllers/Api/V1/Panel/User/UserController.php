<?php
	
	namespace App\Http\Controllers\Api\V1\Panel\User;
	
	use App\Contracts\Responses\Panel\UserListResponse;
	use App\Http\Controllers\Api\ApiController;
	use App\Repositories\UserRepository;
	use Illuminate\Http\Request;
	use App\Http\Controllers\Controller;
	
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
			}catch (\Exception $exception){
				return $this->FailResponse(trans('api.action_is_fail'), 400);
			}
		}
	}
