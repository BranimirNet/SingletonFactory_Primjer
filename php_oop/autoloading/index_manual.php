<?php

require_once 'classes/User.php';
require_once 'classes/Product.php';
require_once 'classes/Order.php';
require_once 'classes/Helper.php';

$user = new User("Marko", "marko@mail.com");
$product = new Product("Laptop", 1200);
$order = new Order("ORD-001", $product->title);

echo $user->info();
echo $product->productInfo();
echo $order->orderInfo();

echo"<br>Formatirani tekst: " . Helper::formatText("oSNove php");
echo "<br>Korijen broja 25 je: " . Helper::korijenBroja(25);
echo "<br>Prosjek niza 10, 20, 30 je: " . Helper::prosjekNiza([10, 20, 30]);



?>