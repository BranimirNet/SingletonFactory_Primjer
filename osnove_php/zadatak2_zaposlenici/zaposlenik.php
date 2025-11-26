<!DOCTYPE html>
<html>
<head>
    <title>POST metoda</title>
    <link rel="stylesheet" href="stil.css">
</head>
<body>
<?php
include "infopodaci.php";

/* --- SIGURNA INICIJALIZACIJA --- */
$odbzanimanja = isset($odbzanimanja) && is_array($odbzanimanja) ? $odbzanimanja : [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ime          = $_POST["ime"];
    $prezime      = $_POST["prezime"];
    $datumrodjenja= $_POST["datumrod"];
    $sprema       = $_POST["sprema"];
    $odbzanimanja = isset($_POST["zanimanje"]) ? $_POST["zanimanje"] : [];
    $email        = $_POST["email"];
    $placa        = $_POST["placa"];
    $aktivan      = $_POST["aktivan"];
    $akt          = $aktivan == 1 ? true : false;

    $odredisniFolder   = "slike/";
    $odredisnaDatoteka = $odredisniFolder . basename($_FILES["datoteka"]["name"]);
    $tmpDat            = $_FILES["datoteka"]["tmp_name"];
    move_uploaded_file($tmpDat, $odredisnaDatoteka);

    $datoteka = "zaposlenici.json";
    if (!file_exists($datoteka)) {
        file_put_contents($datoteka, json_encode([]));
    }

    $postojeciSadrzaj = file_get_contents($datoteka);
    $podaci = json_decode($postojeciSadrzaj, true);

    $id = !empty($podaci) ? max(array_column($podaci, 'id')) + 1 : 1;

    $podaci[] = [
        "id"           => $id,
        "ime"          => $ime,
        "prezime"      => $prezime,
        "datumrodjenja"=> $datumrodjenja,
        "sprema"       => $sprema,
        "odbzanimanja" => $odbzanimanja,
        "email"        => $email,
        "slika"        => $odredisnaDatoteka,
        "placa"        => (float)$placa,
        "aktivan"      => $akt
    ];

    file_put_contents($datoteka,
        json_encode($podaci, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE)
    );
    header("Location: popiszaposlenika.php");
    exit;
}

if (isset($_GET["idzap"])) {
    $datoteka = "zaposlenici.json";
    $postojeciSadrzaj = file_get_contents($datoteka);
    $podaci = json_decode($postojeciSadrzaj, true);

    if ($_GET["action"] == "update") {
        $idZaAzuriranje = $_GET["idzap"];
        foreach ($podaci as &$osoba) {
            $ime          = $osoba["ime"];
            $prezime      = $osoba["prezime"];
            $datumrodjenja= $osoba["datumrodjenja"];
            $spremaPr     = $osoba["sprema"];
            $odbzanimanja = $osoba["odbzanimanja"];  // sada sigurno niz
            $email        = $osoba["email"];
            $slika        = $osoba["slika"];
            $placa        = $osoba["placa"];
            $aktivan      = $osoba["aktivan"];
        }
        unset($osoba);
    }
}

$currentFileName = basename($_SERVER["SCRIPT_NAME"]);
?>
<form method="POST" action="<?php echo $currentFileName; ?>" enctype="multipart/form-data">
    <label>Ime:</label>
    <input type="text" name="ime" id="ime" value="<?php echo $ime ?? ''; ?>">

    <label>Prezime:</label>
    <input type="text" name="prezime" id="prezime" value="<?php echo $prezime ?? ''; ?>">

    <label>Datum rođenja:</label>
    <input type="text" name="datumrod" id="datumrod" value="<?php echo $datumrodjenja ?? ''; ?>">

    <label>Sprema:</label>
    <select name="sprema" id="sprema">
        <option value="-1">Odaberi</option>
        <?php
        foreach ($spreme as $ozn => $spremaOpt) {
            $sel = (isset($spremaPr) && $ozn == $spremaPr) ? "selected" : "";
            echo "<option value='$ozn' $sel>$spremaOpt</option>";
        }
        ?>
    </select>

    <label>Zanimanja:</label>
    <?php
    foreach ($zanimanja as $oznzan => $zanimanje) {
        $checked = (is_array($odbzanimanja) && in_array($oznzan, $odbzanimanja)) ? "checked" : "";
        echo "<label><input type='checkbox' name='zanimanje[]' value='{$oznzan}' {$checked}> {$zanimanje}</label>";
    }
    ?>

    <label>Email:</label>
    <input type="email" name="email" id="email" value="<?php echo $email ?? ''; ?>">

    <label>Plaća:</label>
    <input type="number" name="placa" id="placa" step="0.01" value="<?php echo $placa ?? ''; ?>">

    <label>Slika:</label>
    <input type="file" name="datoteka" id="datoteka">

    <label>Aktivan:</label>
    <input type="radio" name="aktivan" value="1" <?php echo (!empty($aktivan)) ? "checked" : ""; ?>> Da
    <input type="radio" name="aktivan" value="0" <?php echo (isset($aktivan) && !$aktivan) ? "checked" : ""; ?>> Ne

    <input type="submit" value="Spremi">
</form>
</body>
</html>