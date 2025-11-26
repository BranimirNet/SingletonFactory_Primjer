<!DOCTYPE html>
<html>
    <head>
        
        <title>Menopauza</title>
    
    
    </head>


    <body>
        <?php

        /*
        Zene u srednjim godinama su u menopauzi.
        Obicno se javlja izmedu 45-55 godina.
        Napravi program koji pokazuje je li tvoja mama u menopauzi.
        */

        echo "<h2>Je li moja mama u menopauzi?</h2>";

        $mama="mama";
        $starost=51;

        if($starost>=45 && $starost<=55){
            echo "<br>Moja " .$mama. " je u menopauzi.";
        }
        elseif($starost<45){
            echo "<br>Moja " .$mama. " nije u menopauzi.";
        }
        else{ 
            echo "<br>Moja " .$mama. " nije u menopauzi.";
        }

        ?>

    </body>
</html>