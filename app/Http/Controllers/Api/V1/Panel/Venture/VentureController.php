<?php
	
	namespace App\Http\Controllers\Api\V1\Panel\Venture;
	
	use App\Contracts\Responses\Panel\AddVentureResponse;
	use App\Contracts\Responses\Panel\DeleteVentureResponse;
	use App\Contracts\Responses\Panel\VentureListResponse;
	use App\Contracts\Responses\Panel\VentureResponse;
	use App\Entities\VentureEntity;
	use App\Http\Controllers\Api\ApiController;
	use App\Http\Requests\Panel\AddVentureRequest;
	use App\Http\Requests\Panel\DeleteVentureRequest;
	use App\Http\Requests\Panel\UpdateVentureRequest;
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
				$venture = $this->venture->get($ventureId);
				
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
				$response->setData();
				
				return $this->successResponse($response, trans('api.action_is_success'));
			} catch (\Exception $exception) {
				return $this->FailResponse(trans('api.action_is_fail'), 400);
			}
			
		}
		
		public function create(AddVentureRequest $request)
		{
			$request->validated();
			
			try {
				$title = $request->get('title');
				$description = $request->get('description');
				$color = $request->get('color');
				$cover = $request->get('cover');
				$capacity = $request->get('capacity');
				$unitPrice = $request->get('unit_price');
				$projectReturn = $request->get('project_return');
				$duration = $request->get('duration');
				$free = $request->get('free');
				
				$entity = new VentureEntity();
				$entity->setTitle($title)
					->setDescription($description)
					->setColor($color)
					->setCapacity($capacity)
					->setCover($cover)
					->setUnitPrice($unitPrice)
					->setProjectReturn($projectReturn)
					->setDuration($duration)
					->setFree($free);
				$this->venture->create($entity);
				
				$response = new AddVentureResponse();
				$response->setData();
				
				return $this->successResponse($response, trans('api.action_is_success'));
			} catch (\Exception $exception) {
				return $this->FailResponse(trans('api.action_is_fail'), 400);
			}
			
		}
		
		public function update(UpdateVentureRequest $request)
		{
			$request->validated();
			
			try {
				$ventureId = $request->get('venture_id');
				
				$venture = $this->venture->get($ventureId);
				$title = $request->get('title') ?? $venture->title;
				$description = $request->get('description') ?? $venture->description;
				$color = $request->get('color') ?? $venture->color;
				$cover = $request->get('cover') ?? $venture->cover;
				$capacity = $request->get('capacity') ?? $venture->capacity;
				$unitPrice = $request->get('unit_price') ?? $venture->unit_price;
				$projectReturn = $request->get('project_return') ?? $venture->project_return;
				$duration = $request->get('duration') ?? $venture->duration;
				$free = $request->get('free') ?? $venture->free;

				$this->venture->update(
					$venture->id,
					[
						'title'          => $title,
						'description'    => $description,
						'color'          => $color,
						'cover'          => $cover,
						'capacity'       => $capacity,
						'project_return' => $unitPrice,
						'unit_price'     => $projectReturn,
						'duration'       => $duration,
						'free'           => $free
					]
				);
				
				$response = new AddVentureResponse();
				$response->setData();
				
				return $this->successResponse($response, trans('api.action_is_success'));
			} catch (\Exception $exception) {
				return $this->FailResponse(trans('api.action_is_fail'), 400);
			}
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
