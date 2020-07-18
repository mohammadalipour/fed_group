<?php
	
	namespace App\Contracts\Services\Secretary;
	
	
	use App\Entities\OtpEntity;
	use App\Repositories\OtpRepository;
	use Carbon\Carbon;
	use Exception;
	use Illuminate\Support\Facades\Log;
	
	/**
	 * Class Otp
	 * @package App\Contracts\Services\Secretary
	 */
	class Otp
	{
		/**
		 * @var Secretary
		 */
		protected $repository;
		/**
		 * @var
		 */
		protected $mobileNumber;
		/**
		 * @var
		 */
		protected $code;
		
		/**
		 * @param mixed $code
		 * @return Otp
		 */
		public function setCode($code)
		{
			$this->code = $code;
			return $this;
		}
		/**
		 * @var string
		 */
		protected $ttl = '120';
		
		/**
		 * Otp constructor.
		 * @param OtpRepository $repository
		 */
		public function __construct(OtpRepository $repository)
		{
			$this->repository = $repository;
		}
		
		/**
		 * @param mixed $mobileNumber
		 * @return Otp
		 */
		public function setMobileNumber($mobileNumber)
		{
			$this->mobileNumber = $mobileNumber;
			
			return $this;
		}
		
		/**
		 * @param int|null $length
		 * @return $this
		 * @throws Exception
		 */
		public function generate(?int $length = 5)
		{
			$min = str_pad(1, $length, 0);
			$max = str_pad(9, $length, 9);
			try{
				$this->code = random_int($min, $max);
				
				return $this;
				
			}catch (Exception $exception){
				throw new Exception($exception->getMessage());
			}
			
		}
		
		/**
		 * @return mixed
		 * @throws Exception
		 */
		public function store()
		{
			try {
				$ovpEntity = new OtpEntity();
				$ovpEntity->setMobileNumber($this->mobileNumber)
					->setCode($this->code)
					->setExpiredAt(Carbon::now()->addSeconds($this->ttl));
				$this->repository->create($ovpEntity);
				
				return $this->code;
			} catch (\Exception $exception) {
				Log::error($exception->getMessage());
				
				throw new Exception($exception->getMessage());
			}
		}
		
		/**
		 * @return bool
		 * @throws Exception
		 */
		public function validate()
		{
		    //TODO: This is for test if SMS provider dose not response
		    if($this->code==='12345'){
		        return true;
            }

			return $this->repository->isValid($this->mobileNumber, $this->code);
		}
		
		/**
		 * @return mixed
		 * @throws Exception
		 */
		public function expire()
		{
			return $this->repository->expire($this->mobileNumber, $this->code);
		}
	}