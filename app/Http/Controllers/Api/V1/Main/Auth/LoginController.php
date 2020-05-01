<?php
	
	namespace App\Http\Controllers\Api\V1\Main\Auth;
	
	
	use App\Contracts\Response\UserLoginResponse;
	use App\Http\Controllers\Api\ApiController;
	use App\Http\Requests\LoginUserRequest;
	use App\Repositories\UserRepository;
	use Tymon\JWTAuth\Facades\JWTAuth;
	
	class LoginController extends ApiController
	{
		protected $user;
		
		/**
		 * LoginController constructor.
		 * @param UserRepository $repository
		 */
		public function __construct(UserRepository $repository)
		{
			$this->user = $repository;
		}
		
		public function index(LoginUserRequest $request)
		{
			$request->validated();
			$input = $request->only('mobile', 'password');
			
			if (!$token = JWTAuth::attempt($input)) {
				return $this->failResponse(trans('api.invalid_email_or_password'));
			}
			
			$response = new UserLoginResponse();
			$response->setToken($token);
			$response->setData();
			
			return $this->successResponse($response, trans('api.login_is_success'));
		}
	}
