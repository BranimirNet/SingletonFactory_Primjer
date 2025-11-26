<?php

namespace Project\Models;
use Project\Core\BaseEntity;

class Product extends BaseEntity{
    public string $name;
    public float $price;
    public Category $category;

    public function __construct(string $name, float $price, Category $category){
        parent::__construct();
        $this->name = $name;
        $this->price = $price;
        $this->category = $category;
    }

    

    public function toArray(): array{
        return [
            'type'=>'product',
            'name' => $this->name,
            'price' => $this->price,
            'category' => $this->category->toArray(),
            'createdAt' => $this->createdAt
        ];
    }
}




?>

