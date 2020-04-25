<?php

namespace App\Imports;

use App\Product;
use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Concerns\ToModel;

class ProductsImport implements ToModel
{
    /**
     * @param array $row
     * @return Product|Model|Model[]|null
     */
    public function model(array $row)
    {
        return new Product([
            'title' => $row[0],
            'category_id' => $row[1],
            'price' => $row[2],
            'count' => $row[3],
            'description' => $row[4]
        ]);
    }
}
