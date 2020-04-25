<?php

namespace App\Http\Controllers\Api\V1\Auth;


use App\Contracts\UserLoginResponse;
use App\Http\Controllers\Api\ApiController;
use App\Http\Requests\LoginUserRequest;
use App\Repositories\UserRepositoryInterface;
use Tymon\JWTAuth\Facades\JWTAuth;

class LoginController extends ApiController
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

    public function index(LoginUserRequest $request)
    {
        $request->validated();
        $input = $request->only('email', 'password');

        if (!$token = JWTAuth::attempt($input)) {
            return $this->failResponse(trans('api.invalid_email_or_password'));
        }

        $response = new UserLoginResponse();
        $response->setToken($token);
        $response->setData();

        return $this->successResponse($response, trans('api.login_is_success'));
    }
}
