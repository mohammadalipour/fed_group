<?php
	
	namespace App\Http\Controllers\Api\V1\Auth;
	
	use App\Contracts\Responses\SendOtpResponse;
	use App\Contracts\Services\Pigeon\Pigeon;
	use App\Contracts\Services\Pigeon\Providers\KaveNegarProvider;
	use App\Contracts\Services\Secretary\Secretary;
	use App\Http\Controllers\Api\ApiController;
	use App\Http\Requests\SendOtpRequest;
	use App\Http\Requests\VerifyOtpRequest;
	use App\Repositories\OtpRepository;
	use App\Repositories\RepositoryInterface;
	use Exception;
	use Illuminate\Support\Facades\Log;
	
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
				$secretary = new Secretary(new OtpRepository());
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
			
			try {
				$secretary = new Secretary(new OtpRepository());
				if($isValid = $secretary->otp()->setMobileNumber($mobileNumber)->setCode($code)->validate()){
					//check is a registered user?
					
					//if true => return token else return register page
				}
				
			} catch (Exception $exception) {
			
			}
		}
	}
