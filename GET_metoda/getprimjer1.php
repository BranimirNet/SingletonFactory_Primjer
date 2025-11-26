<!DOCTYPE html>
<html>
    <head>
        <title>GET metoda - primjer 1</title>
        <link rel="stylesheet" href="stil.css">
    </head>
    <body>
        <?php
        include_once "sifarnici.php";
        $file=basename($_SERVER["PHP_SELF"]);

        /*
potrebno je učitati datoteku sifarnici.php te učitati ključeve i vrijednosti u HTML tablicu.
zatim je potrebno napraviti link u treću kolonu gdje ćemo prosljeđivati ključ i kada se klikne na link, da ispod
tablice dobijemo odgovarajuću vrijednost.
*/
?>
<table>
<thead>
<tr>
<th>Ključ</th>
<th>Vrijednost</th>
<th>Akcija</th>
</tr>
</thead>
<tbody>
    <?php
foreach($gradovi as $ozn=>$grad){
    $link="<a href='$file?oznaka={$ozn}'>Oznaka</a>";
    echo "<tr>";
    echo "<td>{$ozn}</td>";
    echo "<td>{$grad}</td>";
    echo "<td>{$link}</td>";
    echo "</tr>";
}

?>

</tbody>
</table>

<?php

if(isset($_GET["oznaka"]))

$ozngrad=$_GET["oznaka"];
echo "<label>Vrijednost kliknute oznake ($ozngrad) je {$gradovi [$ozngrad]}</label>";

?>

</body>
</html>

    </body>
</html>