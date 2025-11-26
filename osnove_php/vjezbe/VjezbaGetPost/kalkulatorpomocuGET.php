<!DOCTYPE html>
<html>
<head>
    <title>GET Kalkulator</title>
    <style>
        body { font-family: Arial, sans-serif; text-align: center; margin-top: 50px; }
        form { display: inline-block; padding: 20px; border: 1px solid #ccc; border-radius: 10px; }
        input, select, button { margin: 10px; padding: 5px; }
    </style>
</head>
<body>

<h2>Kalkulator pomoću GET metode</h2>

<form method="GET" action="kalkulatorpomocuGET.php">
    <input type="number" name="broj1" placeholder="Prvi broj" required>
    <select name="operacija">
        <option value="+">+</option>
        <option value="-">-</option>
        <option value="*">*</option>
        <option value="/">/</option>
    </select>
    <input type="number" name="broj2" placeholder="Drugi broj" required>
    <button type="submit">Izračunaj</button>
</form>

<hr>

<?php
if (isset($_GET["broj1"]) && isset($_GET["broj2"]) && isset($_GET["operacija"])) {
    $broj1 = (float)$_GET["broj1"];
    $broj2 = (float)$_GET["broj2"];
    $operacija = $_GET["operacija"];
    $rezultat = 0;

    switch ($operacija) {
        case "+": $rezultat = $broj1 + $broj2; break;
        case "-": $rezultat = $broj1 - $broj2; break;
        case "*": $rezultat = $broj1 * $broj2; break;
        case "/": 
            $rezultat = $broj2 != 0 ? $broj1 / $broj2 : "Nije moguće dijeliti s nulom!"; 
            break;
    }

    echo "<h3>Rezultat: $broj1 $operacija $broj2 = <b>$rezultat</b></h3>";
    echo "<p><b>URL pokazuje podatke jer koristimo GET:</b><br>" . htmlspecialchars($_SERVER['REQUEST_URI']) . "</p>";
}
?>
</body>