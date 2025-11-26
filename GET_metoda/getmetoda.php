<!DOCTYPE html>
<html>
<head>
    <title>GET metoda</title>
    <link rel="stylesheet" href="stil.css">
</head>
<body>
    <form action="getmetoda.php" method="GET">
    Ime: <input type="text" name="ime"><br>
    Godine: <input type="text" name="godine"><br>
    <input type="submit" value="Pošalji">
</form>
<?php
$metoda = $_SERVER["REQUEST_METHOD"];
echo "<br>Metoda: ".$metoda;

foreach($_GET as $k => $v){
    echo "<br>GET name: ".$k;
    echo "<br>GET value: ".$v;
}

if(isset($_GET["ime"]) && !empty($_GET["ime"])){
    $ime = $_GET["ime"];
    echo "<label>Ime je: {$ime}</label>";
} else {
    echo "<label>Varijabla nije postavljena ili je prazna</label>";
}

if(isset($_GET["godine"]) && !empty($_GET["godine"])){
    $godine = $_GET["godine"];
    echo "<label>Godine su: {$godine}</label>";
} else {
    echo "<label>Varijabla 'godine' nije postavljena ili je prazna</label>";
}
?>

<label><a href="getmetoda.php">Ponovni unos</a></label>

</body>
</html>