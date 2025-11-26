<?php

try {
    $file = fopen("log.txt", "a");
    fwrite($file, "Program je pokrenut.\n");
    // Simulacija nekog koda koji može baciti izuzetak
    throw new Exception("Simulirana greska tokom izvrsavanja programa.");
}
catch (Exception $ex) {
    echo"<br>Greska: " . $ex->getMessage();
}
finally {
    fclose($file);
    echo "<br>Datoteka je zatvorena.";
}





?>