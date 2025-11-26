<?php

require_once "Item.php";
require_once "Category.php";

class Product extends Item{
    private Category $category;

    public function __construct($name, $price, Category $category){
        parent::__construct($name,$price);
        $this->name = $name;
        $this->price = $price;
        $this->category = $category;
        $this->createdAt = date("Y-m-d H:i:s");
    }

    public function getInfo(): string {
        return "<br>Proizvod: {$this->name} - ({$this->price} EUR, kategorija: {$this->category->getType()}), - {$this->category->getInfo()})";
    }

    public function getType():string{
        return "Product";
    }
}

// $p1 = new Product("Jabuka",14.30,new Category("Voće","Ovo je voće"));
// echo $p1->getInfo();
// $k2 = new Category("Povrće","Ovo je povrće");
// $p2 = new Product("Krumpir",33,$k2);
// echo $p2->getInfo();
?>