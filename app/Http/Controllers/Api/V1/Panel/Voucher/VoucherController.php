<?php
	
	namespace App\Http\Controllers\Api\V1\Panel\Voucher;
	
	use App\Http\Controllers\Api\ApiController;
	
	class VoucherController extends ApiController
	{
		protected $venture;
		
		/**
		 * UserController constructor.
		 * @param VentureRepository $repository
		 */
		public function __construct(VentureRepository $repository)
		{
			$this->venture = $repository;
		}
	}
