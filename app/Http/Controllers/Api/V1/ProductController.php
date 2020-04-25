<?php

namespace App\Http\Controllers\Api\V1;

use App\Contracts\ImportCategoryResponse;
use App\Contracts\ImportProductResponse;
use App\Contracts\ProductListResponse;
use App\Contracts\ProductResponse;
use App\Http\Controllers\Api\ApiController;
use App\Http\Requests\ImportProductRequest;
use App\Imports\ProductsImport;
use App\Repositories\ProductRepositoryInterface;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Exceptions\LaravelExcelException;
use Maatwebsite\Excel\Facades\Excel;

class ProductController extends ApiController
{
    protected $product;

    /**
     * UserController constructor.
     * @param ProductRepositoryInterface $product
     */
    public function __construct(ProductRepositoryInterface $product)
    {
        $this->product = $product;
    }

    public function import(ImportProductRequest $request)
    {
        $request->validated();
        try {
            Excel::import(new ProductsImport(), $request->file('file'));
            $response = new ImportProductResponse();
            $response->setTitle($request->file('file')->getFilename());
            $response->setData();

            return $this->successResponse($response, trans('api.upload_file_is_successful'));
        } catch (\Exception $exception) {
            return $this->failResponse($exception->getMessage());
        }
    }

    public function list()
    {
        $products = $this->product->paginate();

        $response = new ProductListResponse();
        $response->setItems($products)
            ->setData();

        return $this->successResponse($response);
    }

    public function index(Request $request,int $id)
    {
        $product = $this->product->get($id);

        $response = new ProductResponse();
        $response->setItem($product)
            ->setData();

        return $this->successResponse($response);
    }
}
