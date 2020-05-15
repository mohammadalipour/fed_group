<?php
	
	namespace App\Http\Controllers\Api\V1\Panel\Venture;
	
	use App\Contracts\Responses\Panel\DeleteVentureResponse;
	use App\Contracts\Responses\Panel\VentureListResponse;
	use App\Contracts\Responses\Panel\VentureResponse;
	use App\Http\Controllers\Api\ApiController;
	use App\Http\Requests\Panel\CreateVentureRequest;
	use App\Http\Requests\Panel\DeleteVentureRequest;
	use App\Http\Requests\Panel\UpdatePageRequest;
	use App\Http\Requests\Panel\VentureRequest;
	use App\Repositories\VentureRepository;
	
	class VentureController extends ApiController
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
		
		public function create(CreateVentureRequest $request)
		{
			$request->validated();
			
		}
		
		public function update(UpdatePageRequest $request)
		{
			$request->validated();
			
		}
		
		public function list()
		{
			try {
				$ventures = $this->venture->paginate();
				
				$response = new VentureListResponse();
				$response->setItems($ventures);
				$response->setData();
				
				return $this->successResponse($response);
			} catch (\Exception $exception) {
				return $this->FailResponse(trans('api.action_is_fail'), 400);
			}
		}
		
		public function delete(DeleteVentureRequest $request)
		{
			$request->validated();
			
			try {
				$ventureId = $request->get('venture_id');
				$this->venture->delete($ventureId);
				
				$response = new DeleteVentureResponse();
				$response->setData();
				
				return $this->successResponse($response);
			} catch (\Exception $exception) {
				return $this->FailResponse(trans('api.action_is_fail'), 400);
			}
		}
	}
