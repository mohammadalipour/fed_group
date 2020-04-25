<?php

namespace App\Contracts;


use App\User;

class UserLoginResponse implements ResponseInterface
{
    /**
     * @var array
     */
    protected $data = [];
    
    /**
     * @var string
     */
    protected $token;
	
	/**
	 * @return string
	 */
	public function getToken(): string
	{
		return $this->token;
	}
	
	/**
	 * @param string $token
	 * @return $this
	 */
	public function setToken(string $token)
	{
		$this->token = $token;
		
		return $this;
	}
    

    public function getData()
    {
        return $this->data;
    }

    public function setData()
    {
        $this->data = [
            'token' => $this->token
        ];

        return $this;
    }
}
