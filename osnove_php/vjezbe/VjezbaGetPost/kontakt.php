<!DOCTYPE html>
<html>
<head>
    <title>Kontakt aplikacija</title>
</head>
<body>

<h2>Pretraga korisnika (GET)</h2>
<form method="GET" action="">
    <input type="text" name="ime" placeholder="Upiši ime">
    <button type="submit">Traži</button>
</form>

<?php
if (isset($_GET["ime"])) {
    $ime = $_GET["ime"];
    echo "<p>Rezultat pretrage: Tražili ste korisnika <b>$ime</b>.</p>";
}
?>

<hr>

<h2>Pošalji poruku (POST)</h2>
<form method="POST" action="">
    <input type="text" name="ime" placeholder="Tvoje ime">
    <input type="text" name="poruka" placeholder="Tvoja poruka">
    <button type="submit">Pošalji</button>
</form>

<?php
if (isset($_POST["ime"]) && isset($_POST["poruka"])) {
    $ime = $_POST["ime"];
    $poruka = $_POST["poruka"];
    echo "<p>Poruku od <b>$ime</b>: $poruka</p>";
}
?>

</body>
</html>