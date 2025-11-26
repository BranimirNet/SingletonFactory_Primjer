<!DOCTYPE html>
<html>
<head>
    <title>POST metoda</title>
    <link rel="stylesheet" href="stil.css">
</head>
<body>

<?php
if($_SERVER["REQUEST_METHOD"] == "POST") {

    $odredisniFolder = "uploads/";

    $odredisnaDatoteka = $odredisniFolder . basename($_FILES["datoteka"]["name"]);
    $imeDat = $_FILES["datoteka"]["name"];
    $tmpDat = $_FILES["datoteka"]["tmp_name"];
    $velicinaDat = $_FILES["datoteka"]["size"];
    $tipDat = $_FILES["datoteka"]["type"];

    echo "<h2>Podaci o datoteci:</h2>";
    echo "<label>Naziv: {$imeDat} </label>";
    echo "<label>Tempfile: {$tmpDat} </label>";
    echo "<label>Veličina: " . round($velicinaDat/1024) . " KB </label>";
    echo "<label>Tip datoteke: {$tipDat} </label>";

    if(move_uploaded_file($tmpDat, $odredisnaDatoteka)) {
        echo "<br>Datoteka uspješno postavljena na folder";
    } else {
        echo "<br>Greška pri slanju datoteke!";
    }
}
?>

<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST" enctype="multipart/form-data">
    <label>Datoteka:</label>
    <input type="file" name="datoteka" id="datoteka"><br><br>
    <input type="submit" value="Spremi">
</form>

</body>
</html>