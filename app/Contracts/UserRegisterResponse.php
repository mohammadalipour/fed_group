<?php

namespace App\Contracts;


use App\User;

class UserRegisterResponse implements ResponseInterface
{
    /**
     * @var array
     */
    protected $data = [];
    /**
     * @var User
     */
    protected $user;
    /**
     * @var string
     */
    protected $accessToken;
    /**
     * @var string
     */
    protected $tokenType;
    /**
     * @var int
     */
    protected $expireIn;

    /**
     * @param User $user
     * @return $this
     */
    public function setUser(User $user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @param string $accessToken
     * @return $this
     */
    public function setAccessToken(string $accessToken)
    {
        $this->accessToken = $accessToken;

        return $this;
    }

    /**
     * @param string $tokenType
     * @return $this
     */
    public function setTokenType(string $tokenType)
    {
        $this->tokenType = $tokenType;

        return $this;
    }

    /**
     * @param int $expireIn
     * @return $this
     */
    public function setExpireIn(int $expireIn)
    {
        $this->expireIn = $expireIn;

        return $this;
    }

    public function getData()
    {
        return $this->data;
    }

    public function setData()
    {
        $this->data = [
            'user' => $this->user,
            'access_token' => $this->accessToken,
            'token_type' => $this->tokenType,
            'expires_in' => $this->expireIn
        ];

        return $this;
    }
}
