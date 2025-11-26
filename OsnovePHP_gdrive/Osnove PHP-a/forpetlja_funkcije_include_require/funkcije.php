<!DOCTYPE html>
<html>
    <head>
        <title>PHP funkcije</title>
    </head>
    <body>

    <?php

    Ispis();
    echo "<h1>Funkcije</h1>";

    echo "<h2>Osnovna funkcija</h2>";

    function Ispis(){
        echo "<br>Ja sam funkcija";
    }

    Ispis();
    Ispis();

    echo "<p>Ispis funkcije 10 puta</p>";

    for($i=1;$i<=10;$i++){
        Ispis(); echo " - ".$i." put!";
    }

     echo "<h2>Funkcija sa lokalnom varijablom</h2>";

     function Lokalna(){
        $a=10;
        $b=5;
        $c=$a+$b;
        echo "<br>Rezultat je: ".$c;
        $d=sqrt($c);
        echo "<br>Korijen iz $c: ".$d;
     }

     Lokalna();

     echo "<h2>Funkcija - globalna varijabla</h2>";
     
     $kolicina=100;
     echo "<br>Kolicina: ".$kolicina;

     function Ukupno(){
        global $kolicina;
        $cijena=15;
        $ukupno = $kolicina*$cijena;
        echo "<br>Ukupno: ".$ukupno;
        $kolicina*=2;
     }

     Ukupno();
     echo "<br>Kolicina: ".$kolicina;

     function brojac(){
        static $brojac=0;
        $brojac++;
        echo "<br>Funkcija Brojac pozvana ".$brojac." puta!";
     }

     brojac();
     brojac();
     brojac();

     echo "<h2>Funkcija sa parametrima - 1</h2>";

     $x=25;
     function Korijen($x){
        $korijen = sqrt($x);
        echo "<br>Korijen broja ".$x." je ".$korijen;
     }

     Korijen($x);
     Korijen(36);
     Korijen($x=100);

     function Kvadrat($a=10){
        $kvadrat = pow($a,2);
        echo "<br>Kvadrat broja ".$a." je: ".$kvadrat;
     }

     Kvadrat();
     Kvadrat(15);

     echo "<p>Primjer</p>";
     //ispišite 10 slučajnih brojeva između 10 i 100, te za parne brojeve izračunati korijen broja koristeći
     //funkciju korijen, a za neparne kvadrat broja koriteći funkciju kvadrat.

     for($a=1;$a<=10;$a++){
        $broj=rand(10,100);

        if($broj%2==0){
            Korijen($broj);
        }
        else
        {
            Kvadrat($broj);
        }
     }

     echo "<h2>Funkcija sa parametrima - 2</h2>";

     function ZbrojiBrojeve($x1,$x2){
        $zbroj = $x1+$x2;
        echo "<br>Zbroj brojeva $x1 i $x2 je ".$zbroj;
     }

     ZbrojiBrojeve(100,200);

     echo "<p>Primjer</p>";
     /*
     izgenerirati 10 parova slučajnih brojeva između 10 i 99 te pomoću funkcije ZbrojiBrojeve ispisati očekivani rezultat
     */

     for($m=1;$m<=10;$m++){
        $br1=rand(10,99);
        $br2=rand(10,99);
        ZbrojiBrojeve($br1,$br2);
     }

     echo "<h2>Funkcija koja vraća vrijednost</h2>";

     function ParnostBroja($br){

        if($br%2==0){
            return true;
        }
        else
        {
            return false;
        }
     }

     echo "<br>Broj 5 je paran: ".(int)ParnostBroja(5);
     echo "<br>Broj 10 je paran: ".(int)ParnostBroja(10);

     function SlozenostBroja($brojka){
        $djelitelji=0;
        for($j=1;$j<=$brojka;$j++){
            if($brojka%$j==0){
                $djelitelji++;
            }
        }

        return $djelitelji>2 ? "složen":"prost";
     }

     echo "<br>Složenost broja 10: ".SlozenostBroja(10);
     echo "<br>Složenost broja 5: ".SlozenostBroja(5);

    ?>

    </body>
</html>