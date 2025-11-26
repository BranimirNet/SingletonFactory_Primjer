<!DOCTYPE html>
<html>
    <head>
        <title>Datumi u PHP-u</title>
    </head>
    <body>

    <?php
        $datum = date("d.m.Y");
        echo "<br>Datum: ".$datum;

        $datum_dr_format = date("Y-m-d");
        echo "<br>Datum za SQL: ".$datum_dr_format;

        $dd=date("d");
        $mm=date("m");
        $gg=date("Y");

        echo "<br>Dan: ".$dd;
        echo "<br>Mjesec: ".$mm;
        echo "<br>Godina: ".$gg;

        $praznikrada = "01.05.2024";
        echo "<br>Praznik rada: ".$praznikrada;

        //želim ovaj datum konvertirati za datum za SQL:
        $datumzasql=date("Y-m-d",strtotime($praznikrada));
        echo "<br>Za SQL: ".$datumzasql;

        //https://www.w3schools.com/php/func_date_date.asp
        
    ?>

    </body>
</html>