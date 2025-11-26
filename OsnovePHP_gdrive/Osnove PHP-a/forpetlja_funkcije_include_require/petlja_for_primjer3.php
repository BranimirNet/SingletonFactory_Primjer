<!DOCTYPE html>
<html>
    <head>
        <title>FOR - Primjer 2</title>
    </head>
    <body>

    <?php
        /*
        potrebno je izračunati faktorijele nekog slučajnog broja u rasponu od 3 do 8
        npr. 5 = 5*4*3*2*1 = 120
        */

        $broj=rand(3,8);

        $faktorijeli=1;
        for($temp=$broj;$temp>1;$temp--){
            //echo "<br>Iteracija $faktorijeli=$faktorijeli*$temp";
            $faktorijeli*=$temp;
            
        }

        echo "<br>Faktorijeli broja ".$broj." iznose ".$faktorijeli;
       
    ?>

    </body>
</html>