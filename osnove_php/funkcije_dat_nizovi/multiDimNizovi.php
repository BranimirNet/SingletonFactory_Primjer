<!DOCTYPE html>
<html>
<head>
    <title>PHP Multidimenzionalni nizovi</title>
</head>
<body>
<?php

$matrica = [
    [1,2,3],
    [4,5,6],
    [7,8,9]
];

foreach ($matrica as $i => $red) {
    foreach ($red as $j => $element) {
        echo "<br>Element $element na poziciji ($i,$j)";
    }
}

echo "<p>Osobe</p>";

$osobe = [
    [
        "ime" => "Ana",
        "prezime" => "Anić",
        "godine" => 20
    ],
    [
        "ime" => "Marko",
        "prezime" => "Marić",
        "godine" => 35
    ],
    [
        "ime" => "Ivana",
        "prezime" => "Ivić",
        "godine" => 19
    ]
];

foreach ($osobe as $osoba) {
    echo "Ime: ".$osoba["ime"]."<br>";
    echo "Prezime: ".$osoba["prezime"]."<br>";
    echo "Godine: ".$osoba["godine"]."<br><br>";
}

echo "<p>Primjer proizvodi</p>";

$proizvodi = [
    ["Sifra"=>101, "Naziv"=>"Kruh",    "Cijena"=>1.20, "Zaliha"=>100, "RokIstek"=>"2025-12-31"],
    ["Sifra"=>102, "Naziv"=>"Mlijeko", "Cijena"=>0.99, "Zaliha"=>50,  "RokIstek"=>"2025-10-10"],
    ["Sifra"=>103, "Naziv"=>"Jogurt",  "Cijena"=>0.80, "Zaliha"=>75,  "RokIstek"=>"2025-11-15"]
];

$proizvodi[] = ["Sifra"=>104, "Naziv"=>"Sir",  "Cijena"=>4.20, "Zaliha"=>99,  "RokIstek"=>"2026-01-01"];
array_push($proizvodi, ["Sifra"=>105, "Naziv"=>"Keks", "Cijena"=>5.25, "Zaliha"=>300, "RokIstek"=>"2026-02-01"]);

?>
<table>
<thead>
<tr>
<th>Sifra</th><th>Naziv</th><th>Cijena</th><th>Zaliha</th>
</tr>
</thead>
<tbody>
<?php
foreach ($proizvodi as $pr) {
    echo "<tr>";
    echo "<td>".$pr["Sifra"]."</td>";
    echo "<td>".$pr["Naziv"]."</td>";
    echo "<td>".$pr["Cijena"]."</td>";
    echo "<td>".$pr["Zaliha"]."</td>";
    echo "</tr>";
}
?>
</tbody>
</table>

<table>
<thead>
<tr>
<th>Sifra</th><th>Naziv</th><th>Cijena</th><th>Zaliha</th><th>Rok isteka</th>
</tr>
</thead>
<tbody>
<?php
foreach ($proizvodi as $pr) {
    $datumistek = strtotime($pr["RokIstek"]);
    $klasa = (time() > $datumistek) ? "istekao" : "";
    echo '<tr class="'.$klasa.'">';
    echo "<td>".$pr["Sifra"]."</td>";
    echo "<td>".$pr["Naziv"]."</td>";
    echo "<td>".$pr["Cijena"]."</td>";
    echo "<td>".$pr["Zaliha"]."</td>";
    echo "<td>".$pr["RokIstek"]."</td>";
    echo "</tr>";
}
?>
</tbody>
</table>
</body>
</html>
