<?php 

if ($_SERVER["REQUEST_METHOD"]=="POST") {
    $metala = (float)$_POST['metala'];
    $kristala = (float)$_POST['kristala'];
    $deuterija   = (float)$_POST['deuterija'];

function CijenaCruisera(int $broj): array {
    // Cijena jednog Cruisera
    $cijenaMetala = 20000;
    $cijenaKristala = 7000;
    $cijenaDeuterija = 2000;

    // Ukupna cijena za traženi broj
    $metala = $broj * $cijenaMetala;
    $kristala = $broj * $cijenaKristala;
    $deuterija = $broj * $cijenaDeuterija;
    $potrebno = CijenaCruisera();

    return [
        "metala" => $metala,
        "kristala" => $kristala,
        "deuterija" => $deuterija,
    ];
}
echo "<table>
                <tr><th>Možeš komisionirati:</th></tr>
                <tr><td>$potrebno</td>
                    
              </table>";
}
?>