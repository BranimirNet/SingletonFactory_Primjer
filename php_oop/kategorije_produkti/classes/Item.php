<?php

abstract class Item{

    protected string $name;
    protected float $price;
    protected string $createdAt;

    public function __construct($name,$price){
        $this->name=$name;
        $this->price=$price;
        $this->createdAt = date("Y-m-d H:i:s");
        echo "<br>Kreiran objekt {$this->name}";
    }

    abstract public function getInfo():string;

    public function getName():string{
        return $this->name;
    }

    public function getPrice():float {
        return $this->price;
    }

    public function getCreatedAt():string{
        return $this->createdAt;
    }

}

?>