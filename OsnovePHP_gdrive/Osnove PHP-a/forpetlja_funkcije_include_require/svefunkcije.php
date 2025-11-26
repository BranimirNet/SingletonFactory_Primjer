<?php

    function Aritmetika($br1,$br2,$operacija){
        echo "<br>Broj 1: ".$br1;
        echo "<br>Broj 2: ".$br2;
        echo "<br>Operacija: ".$operacija;
        $rezultat=null;
        switch($operacija){

            case "z":
                $rezultat=$br1+$br2;
            break;
            case "o":
                $rezultat=$br1-$br2;
            break;
            case "m":
                $rezultat=$br1*$br2;
            break;
            case "d":
                if($br2!=0){
                    $rezultat=$br1/$br2;
                }
                else
                {
                    $rezultat="Pokušaj dijeljenja s nulom";
                }
            break;
            case "mod":
                if($br2!=0){
                    $rezultat=$br1%$br2;
                }
                else
                {
                    $rezultat="Pokušaj dijeljenja s nulom";
                }
            break;
            default:
            $rezultat="Pogrešna operacija!";            
        }

        return $rezultat;
    }

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

    function VratiBrojSamoglasnika($tekst){
        $brojac=0;
        for($a=0;$a<strlen($tekst);$a++){
            $znak=substr($tekst,$a,1);
            if($znak == "a" || $znak == "e" || $znak == "i" || $znak == "o" || $znak == "u"){
                $brojac++;
            }
        }
        return $brojac;
    }

?>