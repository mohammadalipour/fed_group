<?php
	
	namespace App\Repositories;
	
	
	use App\Entities\Entity;
	use App\Entities\OtpEntity;
	use App\Entities\OvpEntity;
	use App\Otp;
	use Carbon\Carbon;
	
	class OtpRepository implements RepositoryInterface
	{
		
		/**
		 * @param OtpEntity $entity
		 * @return mixed
		 */
		public function create(Entity $entity)
		{
			return Otp::create(
				[
					'mobile_number' => $entity->getMobileNumber(),
					'code'          => $entity->getCode(),
					'expired_at'    => $entity->getExpiredAt(),
				]
			);
		}
		
		/**
		 * @param $id
		 * @return mixed
		 */
		public function get($id)
		{
			return Otp::find($id);
		}
		
		/**
		 * @return mixed
		 */
		public function all()
		{
			return Otp::all();
		}
		
		/**
		 * @param $id
		 * @return int
		 */
		public function delete($id)
		{
			return Otp::destroy($id);
		}
		
		/**
		 * @param $id
		 * @param array $data
		 * @return mixed
		 */
		public function update($id, array $data)
		{
			return Otp::find($id)->update($data);
		}
		
		/**
		 * @param $mobileNumber
		 * @param $code
		 * @return bool
		 * @throws \Exception
		 */
		public function isValid($mobileNumber, $code): bool
		{
			$otp = $this->getByMobileNumberAndCode($mobileNumber, $code);

			return ($otp->count() > 0) ? true : false;
		}
		
		/**
		 * @param $mobileNumber
		 * @param $code
		 * @return mixed
		 * @throws \Exception
		 */
		private function getByMobileNumberAndCode($mobileNumber, $code)
		{
			try{
				return Otp::where('mobile_number', $mobileNumber)
					->where('code', $code)
					->where('expired_at', '>', Carbon::now())
					->orderBY('created_at', 'DESC');
			}catch (\Exception $exception){
				throw new \Exception($exception->getMessage());
			}
			
		}
		
		/**
		 * @param $mobileNumber
		 * @param $code
		 * @return mixed
		 * @throws \Exception
		 */
		public function expire($mobileNumber, $code)
		{
			$otp = $this->getByMobileNumberAndCode($mobileNumber, $code);
			
			return $otp->delete();
		}
	}