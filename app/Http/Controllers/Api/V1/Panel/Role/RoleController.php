<?php
	
	namespace App\Http\Controllers\Api\V1\Panel\Role;
	
	use App\Contracts\Responses\Panel\RoleListResponse;
	use App\Contracts\Responses\Panel\RoleResponse;
	use App\Http\Controllers\Api\ApiController;
	use App\Http\Requests\panel\RoleRequest;
	use App\Repositories\RoleRepository;
	
	class RoleController extends ApiController
	{
		protected $role;
		
		/**
		 * RoleController constructor.
		 * @param RoleRepository $repository
		 */
		public function __construct(RoleRepository $repository)
		{
			$this->role = $repository;
		}
		
		public function index(RoleRequest $request)
		{
			$request->validated();
			$roleId = $request->get('role_id');
			
			try {
				$role = $this->role->get($roleId);
				
				$response = new RoleResponse();
				$response->setId($role->id);
				$response->setType($role->type);
				$response->setData();
				
				return $this->successResponse($response, trans('api.action_is_success'));
			} catch (\Exception $exception) {
				return $this->FailResponse(trans('api.action_is_fail'), 400);
			}
		}
		
		public function list()
		{
			try {
				$roles = $this->role->all();
				$response = new RoleListResponse();
				$response->setItems($roles);
				$response->setData();
				
				return $this->successResponse($response);
			} catch (\Exception $exception) {
				return $this->FailResponse(trans('api.action_is_fail'), 400);
			}
		}
	}
