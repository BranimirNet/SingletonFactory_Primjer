<?php

require_once "Automobil.php";
require_once "Kamion.php";
require_once "Motocikl.php";

$auto = new Automobil("Subaru", "Impreza", 2006, 6.5, 5);
$kamion = new Kamion("Scania", "S-serija", 2018, 28, 12);
$motor = new Motocikl("Suzuki", "Hayabusa", 2020, 4.2, 690);

$auto->prikaziInfo();
$kamion->prikaziInfo();
$motor->prikaziInfo();

echo "<hr>";
echo "<br>Starost automobila: " . $auto->getStarost() . " godina";
echo "<br>Starost kamiona: " . $kamion->getStarost() . " godina";
echo "<br>Starost motocikla: " . $motor->getStarost() . " godina";