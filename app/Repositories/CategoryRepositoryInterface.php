<?php

namespace App\Repositories;


use App\Entities\CategoryEntity;

interface CategoryRepositoryInterface
{
    /**
     * @param CategoryEntity $userEntity
     * @return mixed
     */
    public function create(CategoryEntity $userEntity);

    /**
     * @param int
     */
    public function get($id);

    /**
     * @return mixed
     */
    public function all();

    /**
     * @param int
     */
    public function delete($id);

    /**
     * @param int
     * @param array
     */
    public function update($id, array $data);
}
