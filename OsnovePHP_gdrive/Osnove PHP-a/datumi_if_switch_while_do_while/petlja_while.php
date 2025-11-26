<!DOCTYPE html>
<html>
    <head>
        <title>Petlja WHILE</title>
        <style>
             table {
            width: 60%;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            font-size: 12px;
            margin-top: 20px
        }

        th, td {
            padding: 10px;
            border: 1px solid #ccc;
            text-align: left;
        }

        th {
            background-color: #333;
            color: #fff;
        }

        .parni{
            background-color: red;
        }

        .neparni{
            background-color: green;
        }
        </style>
    </head>
    <body>

    <?php

    echo "<p>Primjer 1</p>";
    //potrebno je ispisati brojeve od 1 do 10 pomoću while petlje

    $broj=1;
    while($broj<=10){
        echo "<br>Broj: ".$broj;
        $broj++;
    }

    echo "<p>Primjer 2</p>";
    //ispisati brojeve od 20 do -10
    $brojka=20;
    while($brojka>=-10){
        echo "<br>Brojka: ".$brojka--;
    }

    echo "<p>Primjer 3 - CONTINUE</p>";
    //ispis parnih brojeva od 1 do 20
    $br=1;
    while($br<=20){
        if($br%2==1){
            $br++;
            continue;
        }
        
        echo "<br>Br: ".$br++;
    }

    echo "<p>Primjer 4 - BREAK</p>";
    //ispisati brojeve od -5 do 5, te zaustaviti izvršavanje kada vrijednost dođe do 0
    $aa=5;
    while($aa>=-5){
        echo "<br>aa: ".--$aa;
        if($aa==0){
            break;
        }
    }

    echo "<p>Primjer 5</p>";
    /*
    potrebno je ispisati brojeve od 1 do 30, te ispisati:
    - zbroj svih parnih
    - koliko ima onih koji su djeljivi sa 3
    */

    $a=1;
    $zbrojparnih=0;
    $djeljivihsatri=0;
    while($a<=30){
        echo "<br>Broj a: ".$a;
        if($a%2==0){
            $zbrojparnih+=$a;//$zbrojparnih=$zbrojparnih+$a;
        }
        if($a%3==0){
            $djeljivihsatri++;
        }
        $a++;
    }
    echo "<br>Zbroj parnih: ".$zbrojparnih;
    echo "<br>Djeljivih sa 3: ".$djeljivihsatri;

    echo "<p>Primjer 6</p>";
    /*
    potrebno je u html tablicu ispisati prvih 10 brojeva, zatim je potrebno u drugu kolonu izračunati korijen svakog broja
    zaokruženog na 3 decimale, a u treću kolonu ispisati da li je broj paran ili neparan.
    parne ćelije obojiti u crvenu boju, a neparne u zelenu.
    */
    ?>

    <table>
        <thead>
            <tr>
                <th>Broj</th><th>Korijen</th><th>Parnost</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $brojka=1;
            while($brojka<=10){
                $korijen=round(sqrt($brojka),3);
                if($brojka%2==0){
                    $parnost="Paran";
                    $klasa="parni";
                }
                else{
                    $parnost="Neparan";
                    $klasa="neparni";
                }
            ?>
            <tr class="<?php echo $klasa; ?>">
                <td><?php echo $brojka; ?></td>
                <td><?php echo $korijen; ?></td>
                <td><?php echo $parnost; ?></td>
            </tr>
            <?php
            $brojka++;
            }
            ?>
        </tbody>
    </table>

    <?php


    echo "<p>Primjer 7</p>";
    /*
    pomoću while petlje ispisati fibbonacijev niz ako su poznate prve dvije vrijednosti
    0,1 - ispisati niz do 800
    0,1,1,2,3,5,8,13,21,34,55... 800

    1: iteracija: 0 i 1 => 1
    2: iteracija: 1 i 1 => 2
    3: iteracija: 1 i 2 => 3
    4: iteracija: 2 i 3 => 5
    ....
    */

    $prvi=0;
    $drugi=1;
    $sljedeci=$prvi+$drugi;
    while($sljedeci<=800){
        echo $sljedeci.", ";
        $prvi = $drugi;
        $drugi = $sljedeci;
        $sljedeci = $prvi + $drugi;
    }

            ?>


    </body>
</html>