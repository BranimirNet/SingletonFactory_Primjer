<!DOCTYPE html>
<html>
    <head>
        <title>Kontrola SWITCH</title>
        <style>
            .crvena{
                color: red;
            }
            .plava{
                color: blue;
            }
            .zelena{
                color: green;
            }

            label{
                display: block;
            }
        </style>
    </head>
    <body>

    <?php

    //zadana je sifra boje od 1 do 3:
    /*
        1-crvena
        2-plava
        3-zelena
    potrebno je ispitati vrijednost boje, te za dobivenu boju ispisati sljedeće:
    npr. za 1: Odabrana je crvena boja!
    DODATAK: definirati u css-u tri klase za 3 boje pa ih primjeniti ovisno o uvjetu
    tekst ispisati u labelama sa pripadajućom klasom
    DODATAK 2: za slučaj 2, ispisati kvadrat boje (2*2)
    */
    $boja=rand(1,7);
    echo "<br>Boja: ".$boja;

    switch($boja){

        case 1:
            $klasa="crvena";
            echo "<label class=\"$klasa\">odabrana je crvena boja</label>";
        break;
        case 2:
            $klasa="plava";
            echo "<label class=\"$klasa\">odabrana je plava boja</label>";
            $kvadrat=$boja*$boja;
            echo "<label>Kvadrat: ".$kvadrat."</label>";
        break;
        case 3:
            $klasa="zelena";
            echo "<label class=\"$klasa\">odabrana je zelena boja</label>";
        break;
        default:
            echo "<label>Pogrešna boja!</label>";
    }

    $danENG = date("l");

    switch($danENG){

        case "Monday":
        $danCRO="Ponedjeljak";
        break;
        case "Tuesday":
        $danCRO="Utorak";
        break;
        case "Wednesday":
        $danCRO="Srijeda";
        break;
        case "Thursday":
        $danCRO="Četvrtak";
        break;
        case "Friday":
        $danCRO="Petak";
        break;
        case "Saturday":
        $danCRO="Subota";
        break;
        case "Sunday":
        $danCRO="Nedjelja";
        break;
    }

    echo "<br>Dan CRO: ".$danCRO;

    ?>

    </body>
</html>