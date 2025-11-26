<?php

class Order{

    public $orderNumber;
    public $product;

    public function __construct($orderNumber, $product) {
        $this->orderNumber = $orderNumber;
        $this->product = $product;
    }
    public function orderInfo():string {
        return "<br>Order Number: {$this->orderNumber}, Product: {$this->product}";
    }
}








?>