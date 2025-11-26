<?php

require_once 'bootstrap.php';


$user = new User("Ana", "ana@mail.com");
$product = new Product("Telefon", 146.78);
$order= new Order("ORD-002", $product->title);

echo $user->info();
echo $product->productInfo();
echo $order->orderInfo();




?>