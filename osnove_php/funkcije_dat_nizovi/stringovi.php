<!DOCTYPE html>
<html>
    <head>
        <title>PHP stringovi</title>
    </head>
    <body>

    <?php

    $recenica="Danas je srijeda, sredina tjedna";
    //poz:     0123456789
    echo "<br>Rečenica: ".$recenica;

    $duljina = strlen($recenica);
    echo "<br>Duljina stringa: ".$duljina;

    echo "<br>Prvi znak: ".substr($recenica,0,1);
    echo "<br>Treći znak: ".substr($recenica,2,1);
    echo "<br>Sedmi i osmi znak: ".substr($recenica,6,2);
    echo "<br>Zadnji znak: ".substr($recenica,-1);

    echo "<p>Ispis svih znakova:</p>";
    for($i=0;$i<strlen($recenica);$i++){
        $znak=substr($recenica,$i,1);
        echo "<br>Znak: ".$znak;
    }


    echo "<p>Ispisati koliko se puta pojavilo slovo a?</p>";
    $brojac=0;
    for($i=0;$i<strlen($recenica);$i++){
        $znak=substr($recenica,$i,1);
        if($znak=="a"){
            $brojac++;
        }
    }
    echo "<br>Slovo a se pojavilo ".$brojac." puta";

    $broj_slova=substr_count($recenica,"a");
    echo "<br>Broj slova: ".$broj_slova;

    $pozicija_zarez = strpos($recenica,",");
    echo "<br>Pozicija: ".$pozicija_zarez;

    //izdvojiti dio stringa iza zareza
    $izdvojeni_string = substr($recenica,$pozicija_zarez+1,strlen($recenica));
    echo "<br>Izdvojeni string: ".$izdvojeni_string;

    ?>

    </body>
</html>