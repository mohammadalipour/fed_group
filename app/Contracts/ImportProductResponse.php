<?php

namespace App\Contracts;


class ImportProductResponse implements ResponseInterface
{
    /**
     * @var array
     */
    protected $data = [];

    /**
     * @var string
     */
    protected $title;

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return $this
     */
    public function setTitle(string $title)
    {
        $this->title = $title;

        return $this;
    }


    public function getData()
    {
        return $this->data;
    }

    public function setData()
    {
        $this->data = [
            'title' => $this->title
        ];

        return $this;
    }
}
