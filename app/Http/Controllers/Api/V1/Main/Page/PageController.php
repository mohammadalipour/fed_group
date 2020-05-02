<?php
	namespace App\Http\Controllers\Api\V1\Main\Page;
	
	use App\Contracts\Responses\PageResponse;
	use App\Http\Controllers\Api\ApiController;
	use App\Http\Requests\PageRequest;
	use App\Repositories\PageRepository;
	use Illuminate\Support\Facades\Log;
	
	class PageController extends ApiController
	{
		protected $page;
		
		/**
		 * VentureController constructor.
		 * @param PageRepository $repository
		 */
		public function __construct(PageRepository $repository)
		{
			$this->page = $repository;
		}
		
		public function index(PageRequest $request)
		{
			$request->validated();
			$type = $request->get('type');
			
			try{
				$page = $this->page->findByType($type);
				$response=new PageResponse();
				$response->setType($page->type)
					->setContent($page->content)
					->setData();
				
				return $this->successResponse($response);
			}catch (\Exception $exception){
				Log::error($exception->getMessage());
				
				return $this->FailResponse(trans('api.page_not_found'), 400);
			}
		}
	}
