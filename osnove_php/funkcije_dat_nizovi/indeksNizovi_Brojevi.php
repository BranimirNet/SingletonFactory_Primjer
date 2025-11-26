<!DOCTYPE html>
<html>
    <head>
        <title>PHP indeksirani nizovi 2</title>
    </head>
    <body>
        <?php
        include "funk.php";

        $brojevi[0]=35;
        $brojevi[1]=22;
        $brojevi[2]=17;
        $brojevi[3]=19;
        $brojevi[4]=29;
        $brojevi[5]=41;
        $brojevi[6]=32;
        $brojevi[7]=27;

        IspisNiza($brojevi);

        $najmanji = $brojevi[0];
        $najveci = $brojevi[0];
        $suma = 0;
        $sumaneparnihpoz = 0;
        $parnihelem = 0;

        foreach($brojevi as $key => $val){
            $suma += $val;

            if($val < $najmanji){
                $najmanji = $val;
            }

            if($val > $najveci){
                $najveci = $val;
            }

            if($key % 2 == 1){
                $sumaneparnihpoz += $val;
            }

            if($val % 2 == 0){
                $parnihelem++;
            }
        }

        echo "<br>Najmanji element: ".$najmanji;
        echo "<br>Najveći element: ".$najveci;
        $prosjek = $suma / count($brojevi);
        echo "<br>Prosjek: ".$prosjek;
        echo "<br>Suma elemenata neparnih pozicija: ".$sumaneparnihpoz;
        echo "<br>Parnih elemenata u nizu: ".$parnihelem;

        echo "<p>Sortiranje niza - uzlazno: </p>";

//35,22,17,19,29,41,32,27
//35,22,17,19,29,41,32,27

for($i = 0; $i < sizeof($brojevi); $i++){
    for($j = $i + 1; $j < sizeof($brojevi); $j++){
        if($brojevi[$i] > $brojevi[$j]){
            $tmp = $brojevi[$i];
            $brojevi[$i] = $brojevi[$j];
            $brojevi[$j] = $tmp;
        }
    }
}

// Ispis cijelog niza
for($i = 0; $i < sizeof($brojevi); $i++){
    echo "Broj: ".$brojevi[$i]."<br>";
}

echo "<p>Gotove metode za sortiranje</p>";

sort($brojevi);//uzlazno po vrijednosti
IspisNiza($brojevi);

rsort($brojevi);//silazno po vrijednosti
IspisNiza($brojevi);

ksort($brojevi);//uzlazno po indeksu
IspisNiza($brojevi);

krsort($brojevi);//uzlazno po indeksu
IspisNiza($brojevi);

/*
zadana je rečenica: Moje ime je Davorin Bogovic i sve oko mene je crno bijeli svijet
potrebno je rečenicu pretvoriti u niz, te ispisati svaku vrijednost. U produžetku ispisati
koliko je svaka vrijednost velika (duljina), te ukoliko je veća od 5, ispisati 5 i više znakova, inače
ispisati manje od 5 znakova
npr. Davorin => 7 => 5 i više znakova
*/
$recenica="Moje ime je Davorin Bogovic i sve oko mene je crno bijeli svijet";
$rijeci=explode(" ",$recenica);

foreach($rijeci as $val) {
    $duljina=strlen($val);
    echo $val . " => " . $duljina . " => ";
    
    if ($duljina > 5) {
        echo "5 i više znakova";
    } else {
        echo "manje od 5 znakova";
    }
    
    echo "<br>";
}

echo "<p>Primjer za vjezbu:</p>";

/*
potrebno je kreirati indeksirani niz sa 10 brojeva koji se ne smiju ponavljati (u rasponu od 10 do 99)
provjeru postojanja duple vrijednosti napraviti pomoću funkcije provjeriduplog koja kao parametre prima niz i broj
koji se provjerava
ako funkcija vrati true, to je oznaka da postoji broj, u suprotnom vraća false (da ne postoji)
*/

$brojke=array();
$brojke[]=55;

for($m=1;$m<=9; $m++){
    $broj=rand (10,99);
    $ima=ProvjeriDuplog($brojke, $broj);
    if(!$ima){
        $brojke[]=$broj;
    }
    else
    {
        $m--;
    }
}

IspisNiza($brojke);


?>
    </body>
</html>