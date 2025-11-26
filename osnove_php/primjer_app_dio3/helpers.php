<?php

// function UcitajKorisnike(){
//     $file="userData.json";
//     $podaci = file_exists($file) ? json_decode(file_get_contents($file),true) : [];
//     return $podaci;
// }

// function UcitajProizvode(){
//     $file="proizvodi.json";
//     $podaci = file_exists($file) ? json_decode(file_get_contents($file),true) : [];
//     return $podaci;
// }

function UcitajPodatke($file){
    $podaci = file_exists($file) ? json_decode(file_get_contents($file),true) : [];
    return $podaci;
}

function UpravljajKosaricom(){
    if(isset($_GET["akcija"])){
        $sifra=(int)$_GET["sifra"];
        if($_GET["akcija"]==="dodaj"){
            $_SESSION["kosarica"][$sifra]=($_SESSION["kosarica"][$sifra] ?? 0) + 1;
        }
        elseif($_GET["akcija"]==="smanji" && isset($_SESSION["kosarica"][$sifra])){
            $_SESSION["kosarica"][$sifra]--;
            if($_SESSION["kosarica"][$sifra] <=0) unset($_SESSION["kosarica"][$sifra]);
        }
        elseif($_GET["akcija"]==="makni"){
            unset($_SESSION["kosarica"][$sifra]);
        }
        header("Location: index.php");
    }
}

function PronadjiProizvod($proizvodi,$sifra){
    foreach($proizvodi as $proizvod){
        if($proizvod["sifra"]==$sifra){
            return $proizvod;
        }
    }
    return null;
}

?>