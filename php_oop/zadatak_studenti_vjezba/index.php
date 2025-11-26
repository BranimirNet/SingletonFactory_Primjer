<?php

require_once "RedovitiStudent.php";
require_once "IzvanredniStudent.php";

$student1 = new RedovitiStudent("Ivan","Ivić",25,30);
$student2 = new IzvanredniStudent("Marija","Horvat",10,30);

echo $student1->statusStudenta()."<br>";
echo $student2->statusStudenta()."<br>";

?>