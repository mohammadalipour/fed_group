<?php

namespace App\Entities;


use Illuminate\Support\Facades\Hash;

class CategoryEntity
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $title;


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
}
