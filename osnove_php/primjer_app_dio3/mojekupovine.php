<?php

include "zaglavlje.php";

if(!isset($_SESSION["user"])){
    echo "<h3>Neovlasten pristup</h3>";
    exit();
}


$kupovine = file_exists("kosarica.json") ? json_decode(file_get_contents("kosarica.json"), true) : [];
$proizvodi = file_exists("proizvodi.json") ? json_decode(file_get_contents("proizvodi.json"), true) : [];

$mojekupovine=[];

foreach($kupovine as $k){
    if($k["idUser"]==$_SESSION["user"]["idUser"]) {
        $mojekupovine[]=$k;
    }

}
?>

<div id="sadrzaj">
    <h3>Vase narudzbe:<h3>

    <table>
        <tr>
            <th>Sifra</th><th>Naziv</th><th>Kolicina</th><th>Cijena</th><th>Ukupno</th><th>Datum</th>

</table>

</div>
<?php
include "podnozje.php";
?>

