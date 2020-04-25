<?php

namespace App\Repositories;


use App\Entities\UserEntity;

interface UserRepositoryInterface
{
    /**
     * @param UserEntity $userEntity
     * @return mixed
     */
    public function create(UserEntity $userEntity);

    /**
     * @param int
     */
    public function get($userId);

    /**
     * @return mixed
     */
    public function all();

    /**
     * @param int
     */
    public function delete($userId);

    /**
     * @param int
     * @param array
     */
    public function update($userId, array $userData);
}
