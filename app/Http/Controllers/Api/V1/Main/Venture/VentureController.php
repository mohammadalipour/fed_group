<?php
	
	namespace App\Http\Controllers\Api\V1\Main\Venture;
	
	use App\Contracts\Responses\VentureListResponse;
	use App\Http\Controllers\Api\ApiController;
	use App\Http\Requests\VentureListRequest;
	use App\Http\Requests\VentureRequest;
	use App\Repositories\VentureRepository;
	
	class VentureController extends ApiController
	{
		protected $venture;
		/**
		 * VentureController constructor.
		 * @param VentureRepository $repository
		 */
		public function __construct(VentureRepository $repository)
		{
			$this->venture = $repository;
		}
		
		public function index(VentureRequest $request)
		{
			$request->validated();
		}
		
		public function list(VentureListRequest $request)
		{
			$request->validated();
			
			$list = $this->venture->paginate();
			$response = new VentureListResponse();
			$response->setItems($list)
				->setData();
			
			return $this->successResponse($response);
		}
	}
