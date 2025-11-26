<!DOCTYPE html>
<html>
    <head>
        <title>GET metoda - primjer 1</title>
        <link rel="stylesheet" href="stil.css">
    </head>
    <body>
        <?php
        include_once "sifarnici.php";
        $file=basename($_SERVER["PHP_SELF"]);

        /*
potrebno je generirati abecedu slova (engl. alfabet) preko gotove funkcije range, te od svakog slova napraviti
klikabilni link koji kada se aktivira ispiše to slovo i nakon toga pozove funkciju koja vrati popis država koje
počinju sa tim slovom. Ukoliko ne nađe nijednu državu, ispisati poruku: Ne postoji država koja počinje s tim slovom
Napomena: popis država se nalazi u skripti sifarnici.php u obliku indeksiranog niza.
*/

$abeceda = range("A", "Z");//indeksirani niz sa slovima
//print_r($abeceda);`
// Ispis linkova za svako slovo
foreach($abeceda as $slovo){
    echo "<a href='$file?znak=$slovo'>$slovo</a> | ";
}

if(isset($_GET["znak"])){
    $znak = $_GET["znak"];
    echo "<br><label>Slovo: {$znak}</label><br>";

    // poziv funkcije za prikaz država
    PopisDrzava($znak);
}

function PopisDrzava($znak): void {
    global $zemlje;
    $brojac = 0; // brojač mora biti ovdje, prije petlje

    foreach($zemlje as $drzava){
        if(substr($drzava, 0, 1) == $znak){
            echo "<label>Država: {$drzava}</label><br>";
            $brojac++;
        }
    }

    if($brojac == 0){
        echo "<label>Ne postoji država koja počinje s tim slovom</label><br>";
    }
}
?>