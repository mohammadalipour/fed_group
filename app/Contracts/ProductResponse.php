<?php

namespace App\Contracts;


use Illuminate\Pagination\Paginator;

class ProductResponse implements ResponseInterface
{
    /**
     * @var array
     */
    protected $data = [];

    /**
     * @var string
     */
    protected $item;

    /**
     * @return string
     */
    public function getItem(): string
    {
        return $this->item;
    }

    /**
     * @param $item
     * @return $this
     */
    public function setItem($item)
    {
        $this->item = $item;

        return $this;
    }


    public function getData()
    {
        return $this->data;
    }

    public function setData()
    {
        $this->data = [
            $this->item
        ];

        return $this;
    }
}
