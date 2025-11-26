<!DOCTYPE html>
<html>
    <head>
        <title>Funkcija za provjeru broja</title>
    </head>
    <body>
       
<?php 
/*CHAT GPT ZADATAK*/
/*Napravi PHP funkciju provjeriBroj($broj) koja:

Provjerava da li je broj pozitivan, negativan ili nula.

Ispisuje odgovarajuću poruku:

"Broj je pozitivan"

"Broj je negativan"

"Broj je nula"

Ako je broj veći od 100, dodaj "Wow, veliki broj!".

Pozovi funkciju sa nekoliko različitih brojeva da testiraš sve slučajeve.*/

echo "<h2>Funkcija za provjeru broja</h2>";

$broj=rand(-200,200);


function provjeriBroj($broj) {
    if ($broj>0) {
        echo "<br>Broj je pozitivan";
        if ($broj>100) {
            echo "<br>Wow, veliki broj!";
        }
    }
    elseif ($broj==0) {
        echo "<br>Broj je nula";
    }
    else {
        echo "<br>Broj je negativan";
    }
}

echo "<br>Broj: ".$broj;

provjeriBroj($broj);


?>

    </body>
</html>