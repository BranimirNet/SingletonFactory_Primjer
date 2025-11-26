<?php

require_once "Kalkulator.php";

$calc = new Kalkulator();

try {
    echo $calc->dijeli(10, 2);
    echo "<br>";
    echo $calc->dijeli(5, 1);
    echo "<br>";
    echo $calc->dijeli(5, 2);
} catch (Exception $ex) {
    echo "<br>Greška: " . $ex->getMessage();
}

?>
