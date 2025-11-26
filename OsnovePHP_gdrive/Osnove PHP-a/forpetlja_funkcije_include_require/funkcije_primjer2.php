<!DOCTYPE html>
<html>
    <head>
        <title>Funkcije - primjer 1</title>
    </head>
    <body>
    <?php
    /*
    Potrebno je napraviti funkciju koja prima tri parametra: 2 broja i operaciju (z,o,m,d,mod).
    Ovisno o odabranoj operaciji izračunava se rezultat korištenjem switch kontrolne strukture.
    Kod operacija d i mod ugraditi zaštitu od spriječavanja dijeljenja s nulom!
    Funkcija treba vratiti konačan rezultat operacije nad brojevima. U slučaju pogrešne operacije, funkcija
    treba vratiti: Pogrešna operacija!
    */

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

    echo "<br>Aritmetika: ".Aritmetika(100,0,"t");


    ?>
    </body>
</html>