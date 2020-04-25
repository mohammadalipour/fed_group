<?php

namespace App\Repositories;

use App\Category;
use App\Entities\CategoryEntity;
use Illuminate\Database\Eloquent\MassAssignmentException;

class CategoryRepository implements CategoryRepositoryInterface
{

    /**
     * @inheritDoc
     */
    public function all()
    {
        return Category::all();
    }

    /**
     * @inheritDoc
     */
    public function delete($id)
    {
        return Category::destroy($id);
    }

    /**
     * @inheritDoc
     */
    public function paginate($perPage = 10)
    {
        return Category::paginate($perPage);
    }

    /**
     * @inheritDoc
     */
    public function update($id, array $data)
    {
        return Category::find($id)->update($data);
    }

    /**
     * @param CategoryEntity $categoryEntity
     * @return mixed|string
     */
    public function create(CategoryEntity $categoryEntity)
    {
        try {
            return Category::create(
                [
                    'title' => $categoryEntity->getTitle()
                ]
            );
        } catch (MassAssignmentException $exception) {
            return $exception->getMessage();
        }

    }

    /**
     * @param $categoryId
     * @return mixed
     */
    public function products($categoryId)
    {
        if(!$category= $this->get($categoryId)){
            return [];
        }

        try {
            return $category->products()->paginate(10);
        }catch (\Exception $exception){
            return $exception->getMessage();
        }
    }

    /**
     * @inheritDoc
     */
    public function get($id)
    {
        return Category::find($id);
    }
}
