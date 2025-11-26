<?php


require_once "proizvod.php";

$proizvod1 = new Proizvod();
$proizvod1->postaviProizvod("Slušalice", 150, "Audio, video, foto", "Audio oprema");

$proizvod2 = new Proizvod();
$proizvod2->postaviProizvod("Skuter", 2000, "Auto moto", "Motocikli/motori");

$proizvod1->prikaziProizvod();
$proizvod2->prikaziProizvod();


?>