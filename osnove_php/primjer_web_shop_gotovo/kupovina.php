<?php

include "zaglavlje.php";

if(!isset($_SESSION["user"])){
    header("Location: login.php");
    exit();
}

$kosarica=$_SESSION["kosarica"] ?? [];

if(empty($kosarica)){
    die("Košarica je prazna");
}

$datoteka = "kosarica.json";
$kupovine = file_exists($datoteka) ? json_decode(file_get_contents($datoteka),true) : [];

$idkupovine = !empty($kupovine) ? max(array_column($kupovine,'idKupovine')) + 1 : 1;

foreach($kosarica as $sifra=>$kol){
    $kupovine[]=[
        "idKupovine" => $idkupovine,
        "idUser"=>$_SESSION["user"]["idUser"],
        "sifraProizvod"=>$sifra,
        "kolicina"=>$kol,
        "datum_vrijeme"=>date("Y-m-d H:i:s")
    ];
}
file_put_contents($datoteka,json_encode($kupovine, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

$_SESSION["kosarica"]=[];
?>
<div id="sadrzaj">
    <h2>Kupovina je uspješno spremljena!</h2>
    <a href="index.php">Natrag u web shop</a>
</div>
<?php

include "podnozje.php";

?>