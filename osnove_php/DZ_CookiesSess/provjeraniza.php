<?php
session_start();

// Funkcija za provjeru palindroma
function jePalindrom($tekst) {
    $cist = strtolower(str_replace(' ', '', $tekst));
    return $cist === strrev($cist);
}

// Funkcija za brojanje samoglasnika i suglasnika
function brojiSlova($tekst) {
    $samoglasnici = ['a','e','i','o','u','A','E','I','O','U'];
    $brojSamoglasnika = 0;
    $brojSuglasnika = 0;

    $slova = mb_str_split($tekst);
    foreach ($slova as $slovo) {
        if (ctype_alpha($slovo)) {
            if (in_array($slovo, $samoglasnici)) {
                $brojSamoglasnika++;
            } else {
                $brojSuglasnika++;
            }
        }
    }
    return [$brojSamoglasnika, $brojSuglasnika];
}

// Funkcija za brojanje riječi
function brojRijeci($tekst) {
    return str_word_count($tekst, 0, 'čćžšđČĆŽŠĐ');
}

// Funkcija za provjeru brojeva u stringu
function imaBrojeve($tekst) {
    return preg_match('/\d/', $tekst);
}

$rezultat = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $niz = trim($_POST['niz']);

    // Palindrom
    $pal = jePalindrom($niz) ? "Da" : "Ne";
    if ($pal == "Da") {
        $_SESSION['palindrom'] = $niz;
    }

    // Suglasnici / samoglasnici
    list($s, $sg) = brojiSlova($niz);
    if ($sg >= 3 * $s && $s > 0) {
        setcookie("PRAVILO", $niz, time() + 300);
    }

    // Broj riječi
    $brRijeci = brojRijeci($niz);

    // Brojevi u stringu
    $imaBr = imaBrojeve($niz) ? "da" : "ne";

    // Ispis u tablicu
    $rezultat = "
    <table border='1' cellpadding='5' cellspacing='0'>
        <tr>
            <th>Niz</th>
            <th>Palindrom</th>
            <th>Broj suglasnika</th>
            <th>Broj samoglasnika</th>
            <th>Broj riječi</th>
            <th>Prisutnost brojeva?</th>
        </tr>
        <tr>
            <td>$niz</td>
            <td>$pal</td>
            <td>$sg</td>
            <td>$s</td>
            <td>$brRijeci</td>
            <td>$imaBr</td>
        </tr>
    </table>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Provjera niza</title>
</head>
<body>
    <h2>Tekstualni niz:</h2>
    <form method="post" action="">
        <input type="text" name="niz" required>
        <button type="submit">Provjeri</button>
    </form>

    <hr>
    <?= $rezultat ?>
</body>
</html>