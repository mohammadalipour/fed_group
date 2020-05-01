<?php


namespace App\Http\Controllers\Api\V1\Auth;


use App\Http\Controllers\Api\ApiController;

class LogoutController extends ApiController
{
    public function index()
    {
        $token = auth()->logout();
    }
}
