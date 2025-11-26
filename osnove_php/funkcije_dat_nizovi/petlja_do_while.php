<!DOCTYPE html>
<html>
    <head>
        <title>Petlja DO-WHILE</title>
    </head>
    <body>

    <?php

    echo "<p>Primjer 1</p>";

    $broj=11;
    do{
        echo "<br>Broj: ".$broj++;
    }
    while($broj<=10);

    echo "<p>Primjer 2</p>";

    //potrebno je unositi broj sve dok ne pogodimo vrijednost broja preko do-while petlje.
    $tajnibroj=7;

    do{
        $unosbroja=rand(1,12);
    }
    while($tajnibroj!=$unosbroja);

    echo "<br>Broj pogođen!";

    ?>
    </body>
</html>