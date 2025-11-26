<?php
include "zaglavlje.php";

if(!isset($_SESSION["user"])){
    echo "<h3>Neovlašten pristup</h3>";
    exit();
}


$kupovine = file_exists("kosarica.json") ? json_decode(file_get_contents("kosarica.json"),true) : [];
$proizvodi = file_exists("proizvodi.json") ? json_decode(file_get_contents("proizvodi.json"),true) : [];

$mojekupovine=[];

foreach($kupovine as $k){
    if($k["idUser"]==$_SESSION["user"]["idUser"]){
        $mojekupovine[]=$k;
    }
}
?>
<div id="sadrzaj">
<h3>Vaše narudžbe:</h3>

<table>
    <thead>
    <tr>
        <th>Šifra</th><th>Naziv</th><th>Količina</th><th>Cijena</th><th>Ukupno</th><th>Datum</th>
    </tr>
    </thead>
    <tbody>
        <?php foreach($mojekupovine as $kup): 
            $p=PronadjiProizvod($proizvodi,$kup["sifraProizvod"]);
            $ukupno=$kup["kolicina"]*$p["cijena"];
            $datumVrijeme=date("d.m.Y H:i:s",strtotime($kup["datum_vrijeme"]));
            ?>
        <tr>
            <td><?= $kup["sifraProizvod"]; ?></td>
            <td><?= $p["naziv"]; ?></td>
            <td><?= $kup["kolicina"]; ?></td>
            <td class="valutaformat"><?= FormatirajIznos($p["cijena"]); ?> €</td>
            <td class="valutaformat"><?= FormatirajIznos($ukupno); ?> €</td>
            <td><?= $datumVrijeme; ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

</div>
<?php
include "podnozje.php";
?>