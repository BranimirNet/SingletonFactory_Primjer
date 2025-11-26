<?php
session_start();

require_once "classes/Category.php";
require_once "classes/Product.php";

$productName = $_POST["productName"];
$productprice = $_POST["productPrice"];
$categoryName = $_POST["categoryName"];
$categoryDesc = $_POST["categoryDesc"];

$category = new Category($categoryName,$categoryDesc);
$product = new Product($productName,$productprice,$category);

if(!isset($_SESSION["products"])){
    $_SESSION["products"]=[];
}

$_SESSION["products"][] = [
    "product"=>$product->getName(),
    "price"=>$product->getPrice(),
    "category"=>$category->getName(),
    "description"=>$category->getDescription(),
    "createdAt"=>$product->getCreatedAt()
];

header("Location: index.php");

?>