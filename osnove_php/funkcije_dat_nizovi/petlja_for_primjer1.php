<!DOCTYPE html>
<html>
    <head>
        <title>FOR - Primjer 1</title>
    </head>
    <body>

    <?php
    /*
    potrebno je ispisati brojeve od 1 do 30 u for petlji, te kod svakog broja ispisati da li je prost ili složen.
    napomena: složen je onaj broj koji ima više od 2 djelitelja
    */

    for($i=1;$i<=30;$i++){//5
        echo "<br>Broj: ".$i;
        $djelitelji=0;
        for($j=1;$j<=$i;$j++){
            if($i%$j==0){
                $djelitelji++;
            }
        }

        // if($djelitelji>2){
        //     echo " - složen";
        // }
        // else
        // {
        //     echo " - prost";
        // }
        echo $djelitelji>2 ? " - složen":" - prost";

    }
    ?>

    </body>
</html>