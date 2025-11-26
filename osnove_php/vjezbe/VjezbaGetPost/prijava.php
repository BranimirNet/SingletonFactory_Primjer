<!DOCTYPE html>
<html>
<head>
    <title>Prijava korisnika</title>
    <style>
        body { font-family: Arial, sans-serif; text-align: center; margin-top: 50px; }
        form { display: inline-block; padding: 20px; border: 1px solid #ccc; border-radius: 10px; }
        input { margin: 10px; padding: 5px; }
        button { padding: 6px 12px; }
    </style>
</head>
<body>

<h2>Prijava korisnika</h2>

<form method="POST" action="prijava.php">
    <label>Korisničko ime:</label><br>
    <input type="text" name="korisnicko_ime" required><br>

    <label>Lozinka:</label><br>
    <input type="password" name="lozinka" required><br>

    <button type="submit">Prijavi se</button>
</form>

<hr>

<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $korisnicko_ime = $_POST["korisnicko_ime"];
    $lozinka = $_POST["lozinka"];

    $memorija=["korisnicko_ime"=>$korisnicko_ime, "lozinka"=>$lozinka];
    file_put_contents("prijava.json", json_encode($memorija, JSON_PRETTY_PRINT));

    

    echo "<p><b>POST metoda:</b> Podaci su poslani skriveno (nisu vidljivi u URL-u).</p>";
    echo "<p>Korisnik: <b>$korisnicko_ime</b></p>";
    echo "<p>Lozinka: <b>$lozinka</b></p>";

}

echo "<h2>Sve prijave: </h2>";
// Prikaži sve prijave iz JSON-a
if (file_exists("prijava.json")) {
    $prijave = json_decode(file_get_contents("prijava.json"), true);
    foreach ($prijave as $p) {
        echo "<p><b>{$p['korisnicko_ime']}</b>: {$p['lozinka']}</p>";
    }
}
?>



</body>
</html>