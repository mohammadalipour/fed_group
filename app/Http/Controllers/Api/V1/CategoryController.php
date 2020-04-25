<?php

namespace App\Http\Controllers\Api\V1;

use App\Contracts\CategoryListResponse;
use App\Contracts\CategoryResponse;
use App\Contracts\ImportCategoryResponse;
use App\Contracts\ProductListResponse;
use App\Contracts\ProductResponse;
use App\Http\Controllers\Api\ApiController;
use App\Http\Requests\ImportCategoryRequest;
use App\Imports\CategoriesImport;
use App\Repositories\CategoryRepository;
use App\Repositories\CategoryRepositoryInterface;
use App\Repositories\ProductRepositoryInterface;
use Exception;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class CategoryController extends ApiController
{
    protected $category;

    /**
     * UserController constructor.
     * @param CategoryRepositoryInterface $category
     */
    public function __construct(CategoryRepositoryInterface $category)
    {
        $this->category = $category;
    }

    public function import(ImportCategoryRequest $request)
    {
        $request->validated();
        try {
            Excel::import(new CategoriesImport(), $request->file('file'));
            $response = new ImportCategoryResponse();
            $response->setTitle($request->file('file')->getFilename());
            $response->setData();

            return $this->successResponse($response, trans('api.upload_file_is_successful'));
        } catch (Exception $exception) {
            return $this->failResponse($exception->getMessage());
        }
    }


    public function list()
    {
        $categories = $this->category->paginate();

        $response = new CategoryListResponse();
        $response->setItems($categories)
            ->setData();

        return $this->successResponse($response);
    }

    public function index(Request $request, int $id)
    {
        $category = $this->category->get($id);

        $response = new CategoryResponse();
        $response->setItem($category)
            ->setData();

        return $this->successResponse($response);
    }

    public function products(Request $request,int $categoryId)
    {
        $products = $this->category->products($categoryId);

        $response = new ProductListResponse();
        $response->setItems($products)
            ->setData();

        return $this->successResponse($response);
    }
}
