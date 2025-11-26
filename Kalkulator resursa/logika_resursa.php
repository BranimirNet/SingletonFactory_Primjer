<?php
if ($_SERVER["REQUEST_METHOD"]=="POST") {
    $trenutno = (float)$_POST['trenutno'];
    $potrebno = (float)$_POST['potrebno'];
    $brzina   = (float)$_POST['brzina'];

    if ($potrebno > $trenutno && $brzina > 0) {
        $nedostaje = $potrebno - $trenutno;

        // koliko ukupno sati treba (decimalno)
        $ukupno_sati = $nedostaje / $brzina;

        // pretvori u sate i minute
        $sati   = floor($ukupno_sati);
        $minute = floor(($ukupno_sati - $sati) * 60);

        // izračunaj završno vrijeme
        $sekunde = ($sati * 3600) + ($minute * 60);
        $zaokruzeno=round($sekunde, 2);
        $vrijeme_zavrsetka = date("d.m.Y H:i", time() + $sekunde);

        echo "<table>
                <tr><th colspan='2'>Rezultat</th></tr>
                <tr><td>Nedostaje:</td>
                    <td style='color:red; font-weight:bold;'>$nedostaje</td></tr>
                <tr><td>Vrijeme potrebno:</td>
                    <td style='color:blue; font-weight:bold;'>$sati : $minute i $sekunde sek</td></tr>
                <tr><td>Bit će gotovo u:</td>
                    <td style='color:green; font-weight:bold;'>$vrijeme_zavrsetka</td></tr>
              </table>";
    } else {
        echo "<p style='color:red; font-weight:bold;'>
              Već imaš dovoljno resursa ili brzina nije ispravna!
              </p>";
    }
}
?>