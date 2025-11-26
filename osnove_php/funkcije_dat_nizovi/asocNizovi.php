<!DOCTYPE html>
<html>
<head>
    <title>Predlozak za vjezbe</title>
</head>
<body>
<?php

include "svefunkcije.php";

$imena = array("Pero"=>45, "Dado"=>15, "Miro"=>50, "Ana"=>36, "Cico"=>55);

IspisNiza($imena);

echo "Dado ima: ".$imena["Dado"]." godina!";

$imena["Bobo"] = 32;

IspisNiza($imena);

$key1 = key($imena);
echo "<br>Prvi ključ: ".$key1;

$val1 = current($imena);
echo " Prva vrijednost: ".$val1;

$maksime = key($imena);
$maksgod = current($imena);

foreach ($imena as $ime => $god) {
    if ($god > $maksgod) {
        $maksgod = $god;
        $maksime = $ime;
    }
}

echo "<br>Najstariji: ".$maksime.", godine: ".$maksgod;

$dani = array(
    "Monday"    => "Ponedjeljak",
    "Tuesday"   => "Utorak",
    "Wednesday" => "Srijeda",
    "Thursday"  => "Četvrtak",
    "Friday"    => "Petak",
    "Saturday"  => "Subota",
    "Sunday"    => "Nedjelja"
);

$currDay = date("l");
echo "<br>Danas je: ".$dani[$currDay];

$osoba = [
    "ime"     => "Pero",
    "prezime" => "Perić",
    "godine"  => 25,
    "placa"   => 2578.56
];

IspisNiza($osoba);

echo "<p>Primjer</p>";

$auti["BMW"]      = "Pero";
$auti["Audi"]     = "Mate";
$auti["Kia"]      = "Ana";
$auti["Golf"]     = "Pero";
$auti["Mercedes"] = "Miro";
$auti["Opel"]     = "Pero";
$auti["Honda"]    = "Mate";
$auti["Toyota"]   = "Marko";
$auti["Fiat"]     = "Bobo";
$auti["Ford"]     = "Cico";
$auti["Jetta"]    = "Pero";
$auti["Jaguar"]   = "Bobo";
$auti["Dacia"]    = "Robo";
$auti["Renol"]    = "Zlatko";
$auti["Suzuki"]   = "Pero";
$auti["Hyundai"]  = "Bobo";
$auti["Zastava"]  = "Miro";

$vlasnici = array();

foreach ($auti as $key1 => $val1) {
    $brojac = 0;
    foreach ($auti as $key2 => $val2) {
        if ($val1 == $val2) {
            $brojac++;
        }
    }
    $vlasnici[$val1] = $brojac;
}

arsort($vlasnici);

foreach ($vlasnici as $vlasnik => $brauta) {
    echo "<br>Vlasnik ".$vlasnik." posjeduje ".$brauta." auta";
}

ksort($vlasnici);
IspisNiza($vlasnici);

krsort($vlasnici);
IspisNiza($vlasnici);

$sifreProizvodi["101"] = "Jabuka";
$sifreProizvodi["102"] = "Kruška";
$sifreProizvodi["103"] = "Ananas";
$sifreProizvodi["104"] = "Banana";
$sifreProizvodi["105"] = "Naranča";

$numericNiz = array(99,102,105,109,111,120,17);
$novi = [];

foreach ($numericNiz as $val1) {
    foreach ($sifreProizvodi as $key2 => $val2) {
        if ($val1 == $key2) {
            $novi[] = $val2;
        }
    }
}

?>
</body>
</html>