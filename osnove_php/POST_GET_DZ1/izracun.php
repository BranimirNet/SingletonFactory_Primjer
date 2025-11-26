<?php
require_once "func.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $broj1 = $_POST["broj1"];
    $broj2 = $_POST["broj2"];
    $operacija = $_POST["operacija"];

    // Validacija brojeva (dozvoljava i int i float)
    if (!is_numeric($broj1) || !is_numeric($broj2)) {
        die("Greška: oba unosa moraju biti numerička (int ili float).");
    }

    $a = (float)$broj1;
    $b = (float)$broj2;
    $rezultat = "";

    switch ($operacija) {
        case "zbrajanje":
            $rezultat = zbrajanje($a, $b);
            break;
        case "oduzimanje":
            $rezultat = oduzimanje($a, $b);
            break;
        case "mnozenje":
            $rezultat = mnozenje($a, $b);
            break;
        case "dijeljenje":
            $rezultat = dijeljenje($a, $b);
            break;
        case "ostatak":
            // Za ostatak koristimo originalne vrijednosti (int) ako su cijeli brojevi,
            // ali (float) pretvorba će raditi i na decimale – PHP % radi s int.
            $rezultat = ostatak($a, $b);
            break;
        default:
            $rezultat = "Nepoznata operacija!";
    }

    echo "<h2>Rezultat</h2>";
    echo "<p>Prvi broj: $a</p>";
    echo "<p>Drugi broj: $b</p>";
    echo "<p>Operacija: $operacija</p>";
    echo "<p>Rezultat: $rezultat</p>";
} else {
    echo "Forma nije ispravno poslana.";
}
?>