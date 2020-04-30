<?php


namespace App\Http\Controllers\Api\V1\Auth;


use App\Contracts\Response\UserRegisterResponse;
use App\Entities\UserEntity;
use App\Http\Controllers\Api\ApiController;
use App\Http\Requests\RegisterUserRequest;
use App\Repositories\RepositoryInterface;
use App\Repositories\UserRepository;
use App\Repositories\UserRepositoryInterface;
use Exception;
use Illuminate\Support\Facades\Log;
use Tymon\JWTAuth\Facades\JWTAuth;

class RegisterController extends ApiController
{
    protected $user;
	
	/**
	 * RegisterController constructor.
	 * @param UserRepository $repository
	 */
    public function __construct(UserRepository $repository)
    {
        $this->user = $repository;
    }

    public function index(RegisterUserRequest $request)
    {
        $request->validated();

        try {
            $userEntity = new UserEntity();
            $userEntity->setEmail($request->get('email'));
            $userEntity->setName($request->get('name'));
            $userEntity->setPassword($request->get('password'));
            $userEntity->setMobileNumber($request->get('mobile_number'));
            $user = $this->user->create($userEntity);

            $token = JWTAuth::fromUser($user);

            $response = new UserRegisterResponse();
            $response->setUser($user)
                ->setAccessToken($token)
                ->setTokenType('bearer')
                ->setExpireIn(JWTAuth::factory()->getTTL() * 60)
                ->setData();

            return $this->successResponse($response);
        } catch (Exception $exception) {
        	Log::error($exception->getMessage());
            return $this->FailResponse(trans('api.register_failed'),400);
        }
    }
}
