<?php

namespace App\Http\Controllers\panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\ImportProductRequest;
use App\Imports\ProductsImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Exceptions\LaravelExcelException;
use Maatwebsite\Excel\Facades\Excel;

class ProductController extends Controller
{
    public function index(Request $request)
    {

    }

    public function import(ImportProductRequest $request)
    {
        $request->validated();
        try {
            Excel::import(new ProductsImport(), $request->file('file'));
        } catch (LaravelExcelException $exception) {
            return $exception->getMessage();
        }

        return back();
    }
}
