<!DOCTYPE html>
<html>
    <head>
        <title>Operatori u PHP</title>
    </head>
    <body>

    <?php
    /*
    Definirajte varijable a, b, c i d. Varijablama a i b dodijelite vrijednost integer, a varijablama c i d vrijednost string.
    Nad varijablama a i b primijenite sve aritmetičke operatore i ispišite rezultate.
    Nad varijablama c i d primijenite operator konkatenacije i dobivenu vrijednost dodijelite varijabli f, te ispišite vrijednost varijable f.
    Nad varijablama a i b primijenite jedan od kombiniranih operatora dodjele i ispišite rezultat.
    Nad varijablom a i b primijenite operator usporedbe (veće od) i pomoću var_dump() funkcije ispišite rezultat. 
    Nad varijablom a primijenite operator inkrementa i istovremeno ispišite rezultat.
    Nad varijablom b primijenite operator dekrementa i istovremeno ispišite rezultat.
    */

    $a=10;
    $b=25;
    $c="Zagreb";
    $d="Split";

    echo "<br>".($a+$b);
    echo "<br>".($a-$b);
    echo "<br>".($a*$b);
    echo "<br>".($a/$b);
    echo "<br>".($a%$b);

    $f = $c.$d;
    echo "<br>".$f;
    echo "<br>".$c." - ".$d;
    $a+=$b;
    echo "<br>".$a;
    echo "<br>";
    var_dump($a>$b);
    echo "<br>Inkrement a: ".$a++;
    echo "<br>Inkrement b: ".$b--;
    ?>
    </body>
    </html>