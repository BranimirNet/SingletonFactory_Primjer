<?php 

function UcitajPodatke($file){
    $podaci = file_exists($file) ? json_decode(file_get_contents($file),true) : [];
    return $podaci;
}

function KalkulatorResursa(){
if ($_SERVER["REQUEST_METHOD"]=="POST") {
    $trenutno=(float)$_POST['trenutno'];
    $potrebno= (float)$_POST['potrebno'];
    $brzina=(float)$_POST['brzina'];

    if ($potrebno>$trenutno&&$brzina > 0) {
        $nedostaje=$potrebno-$trenutno;
        $sati=floor($nedostaje/$brzina);
        $minute=round((($nedostaje/$brzina)-$sati)*60);

        echo "<table>
                <tr><th colspan='2'>Rezultat</th></tr>
                <tr><td>Nedostaje:</td><td style='color:red; font-weight:bold;'>$nedostaje</td></tr>
                <tr><td>Vrijeme potrebno:</td><td style='color:blue; font-weight:bold;'>$sati h i $minute min</td></tr>
              </table>";
    } else {
        echo "<p style='color:red; font-weight:bold;'>Vec imas dovoljno resursa ili brzina nije ispravna!</p>";
    }
}
}
?>





?>