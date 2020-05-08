<?php
	
	namespace App\Http\Controllers\Api\V1\Main\User;
	
	use App\Contracts\Responses\UpdateProfileResponse;
	use App\Contracts\Responses\UserProfileResponse;
	use App\Http\Controllers\Api\ApiController;
	use App\Http\Requests\ProfileRequest;
	use App\Http\Requests\UpdateProfileRequest;
	use App\Repositories\UserRepository;
	use Tymon\JWTAuth\Facades\JWTAuth;
	
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
		
		public function profile(ProfileRequest $request)
		{
			$request->validated();
			
			try {
				$user = JWTAuth::parseToken()->authenticate();
				
				$response = new UserProfileResponse();
				$response->setName($user->name);
				$response->setMobileNumber($user->mobile_number);
				$response->setEmail($user->email);
				$response->setData();
				
				return $this->successResponse($response);
			} catch (\Exception $exception) {
				return $this->FailResponse(trans('api.action_is_fail'), 400);
			}
		}
		
		public function update(UpdateProfileRequest $request)
		{
			$request->validated();
			try {
				$user = JWTAuth::parseToken()->authenticate();
				
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
				
				$response = new UpdateProfileResponse();
				$response->setData();
				
				return $this->successResponse($response, trans('api.action_is_success'));
			} catch (\Exception $exception) {
				return $this->FailResponse(trans('api.action_is_fail'), 400);
			}
		}
	}
