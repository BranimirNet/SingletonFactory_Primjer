<?php

require_once __DIR__.'/Core/IEntity.php';
require_once __DIR__.'/Core/BaseEntity.php';
require_once __DIR__.'/Customers/Customer.php';
require_once __DIR__.'/Employees/Employee.php';

use OrdersProject\Customers\Customer as Kupac;
use OrdersProject\Employees\Employee as Zap;

function parseInput($string){
    $data=[];
    foreach($string as $key=>$value){
        if($key!=="entity"){
            $data[$key]=$value;
        }
    }
    return $data;
}

if($_SERVER["REQUEST_METHOD"]=="POST"){

    $entity = $_POST["entity"];
    $datareceived = parseInput($_POST);

    switch($entity){
        case 'employee':
            $obj = new Zap();
        break;
        case 'customer':
            $obj = new Kupac();
        break;
        default:
        die("Nepoznat entitet");
    }

    $obj->add($datareceived);
    echo "<h2>Podaci uspješno spremljeni u JSON datoteku za entitet {$entity}</h2>";
    echo "<p><a href='index.php'>Povratak</a></p>";

    $records = $obj->getAll();
    echo "<table border='1' cellpadding='5' cellspacing='0'>";
    echo "<tr>";
    foreach(array_keys($records[0]) as $header) echo "<th>{$header}</th>";
    echo "</tr>";
    foreach($records as $row){
        echo "<tr>";
        foreach($row as $value) echo "<td>{$value}</td>";
        echo "</tr>";
    }
    echo "</table>";

}
?>