<?php
	
	namespace App\Http\Controllers\Api\V1\Main\Auth;
	
	use App\Contracts\Responses\SendOtpResponse;
	use App\Contracts\Responses\VerifyOtpResponse;
	use App\Contracts\Services\Pigeon\Pigeon;
	use App\Contracts\Services\Pigeon\Providers\KaveNegarProvider;
	use App\Contracts\Services\Secretary\Secretary;
	use App\Http\Controllers\Api\ApiController;
	use App\Http\Requests\SendOtpRequest;
	use App\Http\Requests\VerifyOtpRequest;
	use App\Repositories\OtpRepository;
	use App\Repositories\RepositoryInterface;
	use App\Repositories\UserRepository;
	use Exception;
	use Tymon\JWTAuth\Facades\JWTAuth;
	
	class OtpController extends ApiController
	{
		protected $otp;
		
		/**
		 * OtpController constructor.
		 * @param RepositoryInterface $repository
		 */
		public function __construct(OtpRepository $repository)
		{
			$this->otp = $repository;
		}
		
		public function send(SendOtpRequest $request)
		{
			$request->validated();
			
			$mobileNumber = $request->get('mobile_number');
			
			try {
				$secretary = new Secretary($this->otp);
				$otp = $secretary->otp()->generate()->setMobileNumber($mobileNumber)->store();
				
				$pigeon = new Pigeon(new KaveNegarProvider());
				$pigeon->send(trans('api.otp_is', ['otp' => $otp]));
				
				$response = new SendOtpResponse();
				$response->setMobileNumber($mobileNumber)->setData();
				
				return $this->successResponse(
					$response,
					trans('api.otp_send_to_mobile_number', ['mobile_number' => $mobileNumber])
				);
			} catch (Exception $exception) {
				return $this->FailResponse(trans('api.sending_otp_is_failed'), 400);
			}
		}
		
		public function verify(VerifyOtpRequest $request)
		{
			$request->validated();
			
			$mobileNumber = $request->get('mobile_number');
			$code = $request->get('code');
			
			$secretary = new Secretary($this->otp);
			if (!$isValid = $secretary->otp()->setMobileNumber($mobileNumber)->setCode($code)->validate()) {
				return $this->FailResponse(trans('api.the_code_entered_is_incorrect'), 301);
			}
			
			$secretary->otp()->setMobileNumber($mobileNumber)->setCode($code)->expire();
			
			try {
				$userRepository = new UserRepository();
				$response = new VerifyOtpResponse();
				
				if ($user = $userRepository->findByMobileNumber($mobileNumber)) {
					$token = JWTAuth::fromUser($user);
					$response->setIsUserRegistered(true);
					$response->setUser($user->toArray());
					$response->setToken($token);
				}
				
				$response->setData();
				
				return $this->successResponse($response);
			} catch (Exception $exception) {
				return $this->FailResponse(trans('api.verify_otp_is_filed'), 400);
			}
		}
	}
