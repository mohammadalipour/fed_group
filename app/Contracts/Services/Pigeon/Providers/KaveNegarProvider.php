<?php
	
	namespace App\Contracts\Services\Pigeon\Providers;
	
	
	use App\Contracts\Services\Pigeon\PigeonInterface;
	use Illuminate\Support\Facades\Log;
	use Kavenegar\Exceptions\ApiException;
	use Kavenegar\Exceptions\HttpException;
	use Kavenegar\KavenegarApi;
	
	class KaveNegarProvider extends AbstractPigeonProvider implements PigeonInterface
	{
		protected $key = '4E34455668514E62503854576542635157736663357179534B584F39703737484B33774152536D793268633D';
		protected $sender = '1000596446';
		protected $receptor;
		
		/**
		 * @param string $message
		 * @return bool
		 * @throws \Exception
		 */
		public function send(string $message): bool
		{
			try {
				$provider = new KavenegarApi($this->key);
				$provider->Send($this->sender, $this->getReceptor(), $message);
				
				return true;
			} catch (ApiException $exception) {
				Log::error($exception->getMessage());
				
				throw new \Exception($exception->getMessage());
			} catch (HttpException $exception) {
				Log::error($exception->getMessage());
				
				throw new \Exception($exception->getMessage());
			}
		}
		
		/**
		 * @return mixed
		 */
		public function getReceptor()
		{
			return $this->receptor;
		}
		
		/**
		 * @param $receptor
		 * @return $this|AbstractPigeonProvider
		 */
		public function setReceptor($receptor)
		{
			$this->receptor = $receptor;
			
			return $this;
		}
	}