<?php

class Product {
    public string $title;
    public float $price;

    public function __construct(string $title, float $price) {
        $this->title = $title;
        $this->price = $price;
    }
    public function productInfo():string {
        return "<br>Product: {$this->title}, {$this->price} EUR";
    }
}




?>