<?php

namespace App\Repositories;


use App\Entities\ProductEntity;

/**
 * Interface ProductRepositoryInterface
 * @package App\Repositories
 */
interface ProductRepositoryInterface
{
    /**
     * @param ProductEntity $userEntity
     * @return mixed
     */
    public function create(ProductEntity $userEntity);

    /**
     * @param int
     */
    public function get($id);

    /**
     * @return mixed
     */
    public function all();


    /**
     * @param int $perPage
     * @return mixed
     */
    public function paginate($perPage = 10);

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
