<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Comaptible" content="ie=edge">
    <title>Rezultati pretrage</title>
</head>
<body>
<?php
$pojam = $_GET['pojam'] ?? '';
echo "<h3>Trazili ste: $pojam</h3>";

// Ovo je samo primjer – u pravom projektu bi tu bio upit u bazu
if ($pojam == "majica") {
    echo "Pronadena majica - cijena 100 kn";
} elseif ($pojam == "cipele") {
    echo "Pronadene cipele - cijena 300 kn";
} else {
    echo "Nema rezultata.";
}
?>
</body>
</html>