<?php 
 include "zaglavlje.php";

 if(!isset($_SESSION["user"])){
    header("Location: login.php");
    exit();
 }

$kosarica=$_SESSION["kosarica"] ?? [];

if(empty($kosarica)){
    die("Kosarica je prazna");
}

$datoteka="kosarica.json";
$kupovine=file_exists($datoteka) ? json_decode(file_get_contents($datoteka),true) : [];

$idkupovine = !empty($kupovine) ? max(array_column($kupovine, 'id_kupovine')) + 1 : 1;

foreach($kosarica as $sifra=>$kol){
    $kupovine=[
        "id_kupovine"=>$idkupovine,
        "idUser"=>$_SESSION["user"]["idUser"],
        "sifraProizvod"=>$sifra,
        "kolicina"=>$kol,
        "datum_vrijeme"=>date("Y-m-d H:i:s")
    ];
}
file_put_contents($datoteka, json_encode($kupovine), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);



 include "podnozje.php";





?>