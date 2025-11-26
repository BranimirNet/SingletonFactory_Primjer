<!DOCTYPE html>
<html>
    <head>

    <style>
        table { border-collapse: collapse; width: 100%; }
        th, td { border: 1px solid black; padding: 8px; text-align: left; }
        td.num { text-align: right; }
        th { background-color: #f2f2f2; }
    </style>
        
        <title>DZ-Nizovi</title>

        <?php

require_once "funkcije_za_nizove(DZ).php";
require_once "varijable_za_nizove(DZ).php";

$ukupno=0;
$kategorije=["Junior"=>0, "Middle"=>0, "Senior"=>0];

?>
    </head>
    <body>
       <h2>Popis zaposlenika</h2>
<table>
    <tr>
        <th>Šifra</th>
        <th>Ime</th>
        <th>Prezime</th>
        <th>Datum rođenja</th>
        <th>Datum zaposlenja</th>
        <th>Email</th>
        <th>Plaća</th>
        <th>Kategorija</th>
        <th>Nova plaća</th>
        <th>Povećanje</th>
        <th>Vještine</th>
    </tr>

    <?php 
    
    foreach($zaposlenici as $z): 
    $staz=izracunStaza($z["Datum_zaposlenja"]);
    $kat=odredivanjeKategorije($staz);
    $nova=korekcijaPlace($kat, $z["Placa"]);
    $postotak=postotakPorasta($z["Placa"], $nova);

    $ukupno+=$nova;
    $kategorije[$kat]+=$nova;

    ?>

    <tr>
        <td><?=$z["Sifra_zap"]?></td>
        <td><?=$z["Ime"]?></td>
        <td><?=$z["Prezime"]?></td>
        <td><?=$z["Datum_rodenja"]?></td>
        <td><?=$z["Datum_zaposlenja"]?></td>
        <td><?=$z["Email"]?></td>
        <td class="num"><?=number_format($z["Placa"], 2, ",", ".")?>€</td>
        <td><?=$kat ?></td>
        <td class="num"><?=number_format($nova, 2, ",", ".")?>€</td>
        <td class="num"><?=$postotak>0 ? number_format($postotak*100, 1, ",", ".")." %" : "0" ?></td>
        <td><?=vjestine($z["Sifra_zap"], $vjestine)?></td>
    </tr>
<?php endforeach; ?>

</table>

<h3>Ukupni izdaci za plaće:<?=number_format($ukupno, 2, ",", ".")?>€</h3>
<ul>
    <li>Junior:<?=number_format($kategorije["Junior"], 2, ",", ".") ?> €</li>
    <li>Middle:<?=number_format($kategorije["Middle"], 2, ",", ".") ?> €</li>
    <li>Senior:<?=number_format($kategorije["Senior"], 2, ",", ".") ?> €</li>
</ul>

    </body>
</html>