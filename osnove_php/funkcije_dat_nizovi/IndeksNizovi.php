<!DOCTYPE html>
<html>
    <head>
        <title>PHP indeksirani nizoviOsnove HTML - liste</title>
    </head>

    <body>
        <?php

        include "funk.php";

        echo "<p>Kreiranje niza</p>";

        $auto="BMW";
        echo "<br>Auto je ".$auto;

        $auto="AUDI";
        echo "<br>Auto je ".$auto;

        $auti=array("BMW","AUDI","KIA","Mercedes","Skoda","Opel","Golf");

        echo "<br>Ja vozim: ".$auti[0];

        if(in_array("Opel",$auti)){
            echo "<br>Postoji Opel";
        }
        else
        {
            echo "<br>Ne postoji Opel";
        }

        $izraz="Danas je cetvrtak i lijepo je vrijeme";
        $niz=explode(" ",$izraz);

        IspisNiza($niz);

 



        ?>

    </body>
</html>