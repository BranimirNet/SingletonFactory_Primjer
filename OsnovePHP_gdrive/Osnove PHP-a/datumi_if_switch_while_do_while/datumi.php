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

        $vrijeme = date("H:i:s");
        echo "<br>Vrijeme: ".$vrijeme;
        $sat = date("H");
        echo "<br>Sat: ".$sat;
        echo "<br>Sekunde: ".strtotime($praznikrada);

        $datumvrijeme = date("d.m.Y H:i:s");
        echo "<br>Datum vrijeme (timestamp): ".$datumvrijeme;

        $unos="24.07.2023 15:32:45";//datum unosa

        $unossql = date("Y-m-d H:i:s",strtotime($unos));

        echo "<br>Unos sql: ".$unossql;

        $datum1="15.09.2025 17:00:00";
        $datum2="15.09.2025 17:02:30";

        $razlika = strtotime($datum2)-strtotime($datum1);
        echo "<br>Razlika vremena: ".$razlika;

        $trenutni_dan = date("l");//l - lowercase
        echo "<br>Trenutni dan: ".$trenutni_dan;

        //dodavanje mjeseca na trenutni datum

        $dodajmjesec=date("d.m.Y",strtotime("+1 month",strtotime(date("d.m.Y"))));
        echo "<br>dodan mjesec: ".$dodajmjesec;

        $nekidatum="22.03.2022";
        $dodajmjesec=date("d.m.Y",strtotime("+2 months",strtotime($nekidatum)));
        echo "<br>dodan mjesec: ".$dodajmjesec;

    ?>

    </body>
</html>