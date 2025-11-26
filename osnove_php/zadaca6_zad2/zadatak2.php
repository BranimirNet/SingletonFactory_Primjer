<?php

$datoteka="words.json";
function Palindrom($str){
    $bezRazmaka=str_replace(' ','',$str);//sir ima miris => sirimamiris
    $origNiz=strtolower($bezRazmaka);
    $kopija="";
    for($a=1;$a<=strlen($origNiz);$a++){
        $kopija.=substr($origNiz,-$a,1);
    }

    return $origNiz===$kopija;
}

function SuglasniciSamoglasnici($str){
    $samoglasniciSlova = ['a','e','i','o','u'];
    $suglasnici=0;
    $samoglasnici=0;

    for($a=0;$a<strlen($str);$a++){
        $znak=substr($str,$a,1);
        if(in_array(strtolower($znak),$samoglasniciSlova)){
            $samoglasnici++;
        }
        else
        {
            $suglasnici++;
        }
    }
    return [$suglasnici,$samoglasnici];
}


function KolikoRijeci($str){
    $br_rijeci = str_word_count($str);
    return $br_rijeci;
}

function PrisutnostBrojeva($str){
    $imabr=false;
    for($a=0;$a<strlen($str);$a++){
        $znak=substr($str,$a,1);
        if(is_numeric($znak)){
            $imabr=true;
            break;
        }
    }
    return $imabr;
}

if($_SERVER["REQUEST_METHOD"]=="POST"){

    $niz=$_POST["niz"];

    $palindrom = Palindrom($niz) ? "Da":"Ne";


    [$suglasnici,$samoglasnici]=SuglasniciSamoglasnici($niz);
    if($samoglasnici>0 && $suglasnici >= 3*$samoglasnici){
        setcookie("PRAVILO",$niz,time()+300);
    }

    $BrRijeci=KolikoRijeci($niz);
    $imabr=PrisutnostBrojeva($niz) ? "Da":"Ne";
    $statusString=PrisutnostBrojeva($niz) ? "Nepotpuni string":"Potpuni string";

    $rezultat = [
        "Niz"=>$niz,
        "Palindrom"=>$palindrom,
        "Samoglasnici"=>$samoglasnici,
        "Suglasnici"=>$suglasnici,
        "BrojRijeci"=>$BrRijeci,
        "ImaBroj"=>$imabr,
        "StatusString"=>$statusString
    ];

    
    if(!file_exists($datoteka)){
        file_put_contents($datoteka,json_encode([]));
    }

    $zapis=file_get_contents($datoteka);
    $postojeci=json_decode($zapis,true);

    $postojeci[]=$rezultat;

    $pripremi=json_encode($postojeci,JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    file_put_contents($datoteka,$pripremi);
}

$sviRezultati=[];
if(file_exists($datoteka)){
    $sviRezultati=json_decode(file_get_contents($datoteka),true);
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Zadatak 2</title>
        <style>
            body{
                display: flex;
                font-family: Arial, Helvetica, sans-serif;
            }
            form{
                width: 300px;
                padding: 20px; border: 1px solid #ccc;
                margin-right: 30px;
            }
            table{
                border-collapse: collapse;
                min-width: 600px;
            }
            th,td{
                border: 1px solid black;
                padding: 8px;
                text-align: center;
            }
            th{
                background-color: #e7dadaff;
            }

            label{
                display: block;
            }

            input[type="submit"]{
                margin-top: 15px;
            }
        </style>
    </head>
    <body>

    <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <label for="niz">Tekstualni niz</label>
        <label for="input"><input type="text" name="niz" id="niz"></label>
        <label for="submit"><input type="submit" value="Provjeri"></label>
    </form>

    <?php
    if(!empty($sviRezultati)){
    ?>
    <table>
        <thead>
            <tr>
                <th>Niz</th>
                <th>Palindrom</th>
                <th>Broj suglasnika</th>
                <th>Broj samoglasnika</th>
                <th>Broj riječi</th>
                <th>Prisutnost brojeva?</th>
                <th>Status stringa</th>
            </tr>
        </thead>
        <tbody>
            
            <?php
            foreach($sviRezultati as $red){
            ?>
            <tr>
            <td><?php echo $red["Niz"]; ?></td>
            <td><?php echo $red["Palindrom"]; ?></td>
            <td><?php echo $red["Suglasnici"]; ?></td>
            <td><?php echo $red["Samoglasnici"]; ?></td>
            <td><?php echo $red["BrojRijeci"]; ?></td>
            <td><?php echo $red["ImaBroj"]; ?></td>
            <td><?php echo $red["StatusString"]; ?></td>
            </tr>
            <?php
            }
             ?>
            
        </tbody>
    </table>
    <?php
    }
    ?>
    </body>
</html>