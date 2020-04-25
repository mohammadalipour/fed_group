<?php

namespace App\Repositories;

use App\Entities\ProductEntity;
use App\Product;
use Illuminate\Database\Eloquent\MassAssignmentException;

class ProductRepository implements ProductRepositoryInterface
{

    /**
     * @inheritDoc
     */
    public function get($userId)
    {
        return Product::find($userId);
    }

    /**
     * @inheritDoc
     */
    public function all()
    {
        return Product::all();
    }

    /**
     * @inheritDoc
     */
    public function delete($userId)
    {
        return Product::destroy($userId);
    }

    /**
     * @inheritDoc
     */
    public function paginate($perPage = 10)
    {
        return Product::paginate($perPage);
    }

    /**
     * @inheritDoc
     */
    public function update($userId, array $userData)
    {
        return Product::find($userId)->update($userData);
    }

    /**
     * @param ProductEntity $productEntity
     * @return mixed|string
     */
    public function create(ProductEntity $productEntity)
    {
        try {
            return Product::create(
                [
                    'title' => $productEntity->getTitle(),
                    'category_id' => $productEntity->getCategoryId(),
                    'price' => $productEntity->getPrice(),
                    'count' => $productEntity->getCount(),
                    'description' => $productEntity->getDescription(),
                ]
            );
        } catch (MassAssignmentException $exception) {
            return $exception->getMessage();
        }

    }
}
