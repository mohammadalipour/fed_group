<?php
	
	namespace App\Contracts\Services\Secretary;
	
	
	use App\Repositories\RepositoryInterface;
	
	class Secretary
	{
		/**
		 * @var RepositoryInterface
		 */
		protected $repository;
		
		/**
		 * Secretary constructor.
		 * @param RepositoryInterface $repository
		 */
		public function __construct(RepositoryInterface $repository)
		{
			$this->repository = $repository;
		}
		
		/**
		 * @return Otp
		 */
		public function otp()
		{
			return new Otp($this->repository);
		}
	}