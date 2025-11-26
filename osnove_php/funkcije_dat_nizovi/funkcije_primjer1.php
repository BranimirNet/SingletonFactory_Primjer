<!DOCTYPE html>
<html>
    <head>
        <title>Funkcije - primjer 1</title>
    </head>
    <body>
    <?php
    /*
    potrebno je napraviti funkciju kojoj ćemo za prosljeđeni datum vratiti naziv dana 
    na hrvatskom jeziku
    */

    function VratiDanZaDatum($datum){
        $day = date("l",strtotime($datum));

            switch($day){

            case "Monday":
            $danCRO="Ponedjeljak";
            break;
            case "Tuesday":
            $danCRO="Utorak";
            break;
            case "Wednesday":
            $danCRO="Srijeda";
            break;
            case "Thursday":
            $danCRO="Četvrtak";
            break;
            case "Friday":
            $danCRO="Petak";
            break;
            case "Saturday":
            $danCRO="Subota";
            break;
            case "Sunday":
            $danCRO="Nedjelja";
            break;
        }

        return $danCRO;
    }

    echo "<br>Dan za datum 15.04.2019 je bio: ".VratiDanZaDatum("15.04.2019");
    $dan_neradni = VratiDanZaDatum("01.05.2025");
    echo "<br>Dan neradni: ".$dan_neradni;

    function GenerirajSlucajniDatum($pocetnaGod){
        $gg=rand($pocetnaGod,date("Y"));
        $mm=rand(1,12);

        if($mm==2){
            if($gg%4==0){
                $dd=rand(1,29);
            }
            else
            {
                $dd=rand(1,28);
            }
        }
        elseif($mm==1 || $mm==3 || $mm==5 || $mm==7 || $mm==8 || $mm==10 || $mm==12){
            $dd=rand(1,31);
        }
        else
        {
            $dd=rand(1,30);
        }

        if($mm<=9){
            $mm="0".$mm;
        }

        if($dd<=9){
            $dd="0".$dd;
        }

        return $dd.".".$mm.".".$gg;
    }

    $slucDatum=GenerirajSlucajniDatum(2000);
    echo "<br>Slučajni datum: ".$slucDatum;

    echo "<br>Dan za datum ".$slucDatum." je bio: ".VratiDanZaDatum($slucDatum);
    echo "<br>Dan za datum ".GenerirajSlucajniDatum(2000)." je bio: ".VratiDanZaDatum(GenerirajSlucajniDatum(2000));

    //za vježbu:
    //izgenerirati 10 slučajnih datuma i preko funkcije VratiDanZaDatum dobiti dane za te datume
    echo "<br>Primjer vježba<br>";
    for($i=1;$i<=10;$i++){
        $datum = GenerirajSlucajniDatum(2000);
        echo "<br>Dan za datum ".$datum." je bio: ".VratiDanZaDatum($datum);
    }


    ?>
    </body>
</html>