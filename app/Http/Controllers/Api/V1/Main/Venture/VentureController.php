<?php
	
	namespace App\Http\Controllers\Api\V1\Main\Venture;
	
	use App\Contracts\Responses\VentureListResponse;
	use App\Contracts\Responses\VentureResponse;
	use App\Http\Controllers\Api\ApiController;
	use App\Http\Requests\VentureListRequest;
	use App\Http\Requests\VentureRequest;
	use App\Repositories\VentureRepository;
	use Illuminate\Support\Facades\Log;
	
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
			
			try {
				$ventureId = $request->get('venture_id');
				$venture = $this->venture->get($ventureId)->load('impacts', 'phases.details', 'partners');
				$keyFact['details'] = $venture->keyFacts()->detail($ventureId);
				$keyFact['safe_guards'] = $venture->safeGurds()->detail($ventureId);
				$keyFact['return_periods'] = $venture->ReturnPeriods()->detail($ventureId);
				
				$response = new VentureResponse();
				$response->setId($venture->id);
				$response->setTitle($venture->title);
				$response->setDescription($venture->descrption);
				$response->setColor($venture->color);
				$response->setCover($venture->cover);
				$response->setCapacity($venture->capacity);
				$response->setUnitPrice($venture->unit_price);
				$response->setProjectReturn($venture->project_return);
				$response->setDuration($venture->duration);
				$response->setFree($venture->free);
				$response->setKeyFact($keyFact);
				isset($venture->impacts) ? $response->setImpact($venture->impacts) : [];
				isset($venture->phases) ? $response->setPhase($venture->phases) : [];
				isset($venture->partners) ? $response->setPartner($venture->partners) : [];
				$response->setData();
				
				return $this->successResponse($response, trans('api.action_is_success'));
			} catch (\Exception $exception) {
				return $this->FailResponse(trans('api.action_is_fail'), 400);
			}
		}
		
		public function list(VentureListRequest $request)
		{
			$request->validated();
			
			try{
				$list = $this->venture->paginate();
				$response = new VentureListResponse();
				$response->setItems($list)
					->setData();
				
				return $this->successResponse($response);
			}catch (\Exception $exception){
				Log::error($exception->getMessage());
				
				return $this->FailResponse(trans('api.page_not_found'), 400);
			}
		}
	}
