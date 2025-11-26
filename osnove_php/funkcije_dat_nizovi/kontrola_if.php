<!DOCTYPE html>
<html>
    <head>
        <title>Kontrolna struktura if</title>
    </head>
    <body>

    <?php

    echo "<h1>IF bez vitičastih zagrada</h1>";

    echo "<p>Primjer 1</p>";

    $broj=10;

    if($broj==10)
        echo "<br>Broj je jednak 10";


    echo "<p>Primjer 2</p>";

    if($broj>15)
        echo "<br>Broj je veći od 15";//samo ova linija zavisi od if uvjeta
        echo "<br>Nastavak programa";//ova i sve ostale iza nje ne zavise od if uvjeta


    echo "<p>Primjer 3</p>";
        $genbroj=rand(1,10);
        echo "<br>Gen broj: ".$genbroj;
        if($genbroj>5)
            echo "<br>Broj je veći od 5";
        else
            echo "<br>Broj nije veći od 5";

    
    echo "<p>Primjer 4</p>";
    //osoba1 ima 18 godina, a osoba2 20. ako su obje punoljetne, mogu ući u klub, inače ne...
    // $osoba1=18;
    // $osoba2=20;
    $osoba1=rand(15,22);
    $osoba2=rand(15,22);
    echo "<br>Osoba 1 god: ".$osoba1;
    echo "<br>Osoba 2 god: ".$osoba2;

    if($osoba1>=18 && $osoba2>=18)
        echo "<br>Ulazak u klub";
    else
        echo "<br>Zabrana ulaska";

    echo "<p>Primjer 5</p>";
    //Kupiti automobil ako ima više od 150 KS ili je prešao ispod 20000 km.
    // $autoks=140;
    // $autokm=15000;
    $autoks=rand(100,170);
    $autokm=rand(14000,50000);
    echo "<br>Auto ks: ".$autoks;
    echo "<br>Auto km: ".$autokm;
    if($autoks > 150 || $autokm < 20000)
        echo "<br>Kupiti";
    else
        echo "<br>Ne kupiti";

    echo "<h1>IF ELSE IF sa vitičastim zagradama</h1>";
    
    echo "<p>Primjer 6</p>";
    $ime="Andrea";
    $godine=30;
    //ukoliko je ime osobe identično Andrea i godine su jednake 30, ispisati: 
    // Osoba primljena
    // Godište: zadovoljavajuće
    //inače ispisati:
    //Osoba nije primljena:
    //Godine: premalo
    if($ime==="Andrea" && $godine==30){
        echo "<br>Osoba primljena!";
        echo "<br>Godište: zadovoljavajuće";
    }
    else
    {
        echo "<br>Osoba nije primljena!";
        echo "<br>Godište: premalo";        
    }

    echo "<p>Primjer 7 - if, elseif, else</p>";
    /*
    zadan je neki broj u rasponu od 8 do 13. Ispitati sljedeće:
    -ukoliko je broj veći od 10, ispisati: Veći od 10
    -ukoliko je broj manji od 10, ispisati: Manji od 10
    -ukoliko nijedan od prethodna dva uvjeta nije istinit, ispisati Jedak 10.
    */

    $nekibroj=rand(8,13);
    echo "<br>Neki broj: ".$nekibroj;

    if($nekibroj>10){
        echo "<br>Veći od 10";
    }
    elseif($nekibroj<10){
        echo "<br>Manji od 10";
    }
    else
    {
        echo "<br>Jednak 10";
    }

    echo "<p>Primjer 8 - ternarni operator</p>";
    //zadan je neki broj. provjeriti da li je broj paran, ako da, ispisati: Paran, inače ispisati Neparan.
    $brojka=10;
    if($brojka%2==0){
        echo "Paran";
    }
    else
    {
        echo "Neparan";
    }

    echo ($brojka%2==0) ? "Paran" : "Neparan";//ternarni operator

    echo "<p>Zadatak za vježbu</p>";
    //ispišite današnji trenutni dan na hrvatskom jezku koristeći if-elseif-else sturkturu
     $danENG = date("l");
     echo "<br>Dan ENG: ".$danENG;

     if($danENG=="Monday"){
        $danCRO="Ponedjeljak";
     }
     elseif($danENG=="Tuesday"){
        $danCRO="Utorak";
     }
    elseif($danENG=="Wednesday"){
        $danCRO="Srijeda";
     }
    elseif($danENG=="Thursday"){
        $danCRO="Četvrtak";
     }
    elseif($danENG=="Friday"){
        $danCRO="Petak";
     }
    elseif($danENG=="Saturday"){
        $danCRO="Subota";
     }
     else{
        $danCRO="Nedjelja";
     }

     echo "<br>Dan CRO: ".$danCRO;
    ?>

    </body>
</html>