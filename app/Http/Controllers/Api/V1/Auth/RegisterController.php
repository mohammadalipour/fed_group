<?php


namespace App\Http\Controllers\Api\V1\Auth;


use App\Contracts\UserRegisterResponse;
use App\Entities\UserEntity;
use App\Http\Controllers\Api\ApiController;
use App\Http\Requests\RegisterUserRequest;
use App\Repositories\UserRepositoryInterface;
use Exception;
use Tymon\JWTAuth\Facades\JWTAuth;

class RegisterController extends ApiController
{
    protected $user;

    /**
     * UserController constructor.
     * @param UserRepositoryInterface $user
     */
    public function __construct(UserRepositoryInterface $user)
    {
        $this->user = $user;
    }

    public function index(RegisterUserRequest $request)
    {
        $request->validated();

        try {
            $userEntity = new UserEntity();
            $userEntity->setEmail($request->get('email'));
            $userEntity->setName($request->get('name'));
            $userEntity->setPassword($request->get('password'));
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
            return $this->FailResponse($exception->getMessage());
        }
    }
}
