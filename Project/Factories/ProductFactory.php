<?php

namespace Project\Factories;
use Project\Models\Product;

class ProductFactory{
    public static function create(
        string $name, 
        float $price,
        string $catName,
        string $catDesc
    ): Product{
        $category = new Category($catName,$catDesc);
        echo "<br>Factory created category '{$category->name}";
        $product = new Product($name,$price,$category);
        echo "<br>Factory created product '{$product->name}'";
        return $product;
    }

        
}





?>