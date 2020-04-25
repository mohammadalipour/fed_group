<?php

namespace App\Contracts;


use Illuminate\Pagination\Paginator;

class ProductListResponse implements ResponseInterface
{
    /**
     * @var array
     */
    protected $data = [];

    /**
     * @var string
     */
    protected $items;

    /**
     * @return string
     */
    public function getItems(): string
    {
        return $this->items;
    }

    /**
     * @param $items
     * @return $this
     */
    public function setItems($items)
    {
        $this->items = $items;

        return $this;
    }


    public function getData()
    {
        return $this->data;
    }

    public function setData()
    {
        $this->data = [
            $this->items
        ];

        return $this;
    }
}
