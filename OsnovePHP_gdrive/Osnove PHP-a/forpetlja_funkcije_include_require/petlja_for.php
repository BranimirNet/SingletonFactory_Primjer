<!DOCTYPE html>
<html>
    <head>
        <title>Petlja FOR</title>
    </head>
    <body>

    <?php
        
        echo "<p>Ispis brojeva od 1 do 10</p>";

        for($br=1;$br<=10;$br++){
            echo "<br>Broj: ".$br;
        }


        echo "<p>Ispis brojeva od 20 do 10</p>";
        for($a=20;$a>=10;$a--){
            echo "<br>Broj a: ".$a;
        }

        echo "<p>Ispis parnih brojeva od 1 do 30</p>";
        for($x=2;$x<=30;$x+=2){
            echo "<br>Parni broj: ".$x;
        }

        echo "<p>For petlja - prekid</p>";
        //ispisati iznose od 100 do 200. kod iznosa 150, napraviti izlazak (prekid) iz petlje
        for($iznos=100;$iznos<=200;$iznos++){
            echo "<br>Iznos: ".$iznos;
            if($iznos==150){
                break;
            }
        }

        echo "<p>For petlja - ugnježđena</p>";
        /*
        ispisati brojeve od 1 do 10, te pored svakog broja ispisati sve one koji su manji od njega
        */
        for($i=1;$i<=10;$i++){

            echo "<br>Broj: ".$i."|";
            for($j=0;$j<$i;$j++){
                echo $j.",";
            }
        }
    ?>

    </body>
</html>