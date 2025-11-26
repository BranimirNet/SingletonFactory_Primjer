<?php

echo "<h1>Varijable u PHP-u</h1>";

echo "<h2>Pravila pisanja varijabli</h2>";

$ime="Pero";//varijabla ime koja sadrži vrijednost Pero

echo "Ime: $ime";
$grad="Zagreb";

/*
treba ispisati sljedeće:

Osoba Pero voli grad Zagreb

*/

echo "<p>Osoba $ime voli grad $grad</p>";
echo '<p>Osoba $ime voli grad $grad</p>';

//ispisati: Vrijednost varijable $ime je: Pero
echo '<p>Vrijednost varijable $ime je:';
echo "$ime</p>";

$Grad="Split";
echo "<br>Gradovi: $grad i $Grad";

$broj=10;//varijabli smo dodijelili integer
$brojka="100";//varijabli smo dodijelili string

$zbroj = $brojka + $broj;

echo "<br>Zbroj je: $zbroj";

$placa=5285.32;

echo "<br>Plaća : ".$placa;

echo "<h2>KONSTANTE</h2>";

echo PHP_VERSION;

echo "<br>OS: ";
echo PHP_OS;

echo __FILE__;
echo "<br>";
echo __DIR__;

define("PI",3.14);

echo "<br>PI iznosi "; echo PI;

define("BAZA","knjiznica");
define("USER","phpuser");
define("PASS","12345");
define("SERVER","localhost");

echo "<h2>Predefinirane varijable</h2>";

$ime_servera=$_SERVER["SERVER_NAME"];
echo "<br>Ime servera: $ime_servera";

$metoda = $_SERVER['REQUEST_METHOD'];

echo "<br>Metoda: ".$metoda;

echo "<br>Doc root: "; echo $_SERVER['DOCUMENT_ROOT'];
?>