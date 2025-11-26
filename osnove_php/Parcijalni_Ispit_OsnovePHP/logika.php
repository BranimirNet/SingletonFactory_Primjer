<?php
$file="words.json";

if(!file_exists($file)){
    file_put_contents($file, json_encode([]));
}

$words=json_decode(file_get_contents($file), true);

function brojSamoglasnika($rijec){
    $samoglasnici=["a","e","i","o","u","A","E","I","O","U"];
    $broj=0;
    for($i=0; $i<strlen($rijec); $i++){
        if(in_array($rijec[$i], $samoglasnici)){
            $broj++;
        }
    }
    return $broj;
}

$greska="";

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $novaRijec=$_POST["rijec"];

    if($novaRijec==""){
        $greska="Polje ne smije biti prazno!";
    } else {
        $brojSlova=strlen($novaRijec);
        $brojSam=brojSamoglasnika($novaRijec);
        $brojS=$brojSlova - $brojSam;

        $rijeci[] = [
            "rijec"=>$novaRijec,
            "slova"=>$brojSlova,
            "suglasnici"=>$brojS,
            "samoglasnici"=>$brojSam
        ];

        file_put_contents($file, json_encode($rijeci, JSON_PRETTY_PRINT));
    }
}
?>