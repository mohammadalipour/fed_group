<?php

namespace App\Entities;


use Illuminate\Support\Facades\Hash;

class ProductEntity
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $title;

    /**
     * @var int
     */
    protected $categoryId;

    /**
     * @var int
     */
    protected $price;


    /**
     * @var int
     */
    protected $count;

    /**
     * @var string
     */
    protected $description;


    public function getId()
    {
        return $this->id;
    }

    public function setId(int $id)
    {
        $this->id = $id;

        return $this;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle(string $title)
    {
        $this->title= $title;

        return $this;
    }

    public function getCategoryId()
    {
        return $this->categoryId;
    }

    public function setCategoryId(int $categoryId)
    {
        $this->categoryId=$categoryId;

        return $this;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice(int $price)
    {
        $this->price = $price;

        return $this;
    }

    public function getCount()
    {
        return $this->count;
    }

    public function setCount(int $count)
    {
        $this->count = $count;

        return $this;
    }

    public function getDescription()
    {
        return $this->count;
    }

    public function setDescription(string $description)
    {
        $this->description = $description;

        return $this;
    }
}
