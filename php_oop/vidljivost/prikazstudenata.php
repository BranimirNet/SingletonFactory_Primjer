<?php

require_once "student.php";
require_once "evidencijastudenata.php";

$stud1 = new Student();
$stud1->postaviPodatke("Ana", "Anic", "001");

$stud2 = new Student();
$stud2->postaviPodatke("Marko", "Markic", "002");

$evidencija = new evidencijaStudenata();
$evidencija->dodajStudenta($stud1);
$evidencija->dodajStudenta($stud2);
$evidencija->prikaziSve();

?>