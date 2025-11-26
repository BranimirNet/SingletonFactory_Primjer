<?php
session_start();

// Postavljanje cookie-a
if(isset($_GET["postavi"])){
    $korisnik = "pperic";
    setcookie("LOGIN", $korisnik, time() + 20); // cookie traje 20 sekundi
    $_SESSION["postavljen"] = time();
    $poruka = "Cookie postavljen!";
}

// Učitavanje cookie-a
if(isset($_GET["ucitaj"])){
    if(isset($_COOKIE["LOGIN"]) && isset($_SESSION["postavljen"])){
        $vrijednost = $_COOKIE["LOGIN"];
        $razlika = 20 - (time() - $_SESSION["postavljen"]);
        if($razlika < 0) $razlika = 0;
        $poruka = "Vrijednost cookie-a: $vrijednost<br>Cookie traje još: $razlika sekundi!";
    } else {
        $poruka = "Cookie nije postavljen ili je istekao!";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Cookies</title>
</head>
<body>
    <h3>Izbornik</h3>
    <ul>
        <li><a href="cookies.php?postavi=1">Postavi cookie</a></li>
        <li><a href="cookies.php?ucitaj=1">Ucitaj cookie</a></li>
    </ul>

    <?php
    if(isset($poruka)){
        echo "<p>$poruka</p>";
    }
    ?>
</body>
</html>