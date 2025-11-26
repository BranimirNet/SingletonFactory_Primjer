<?php 
include "logika.php"
?>



<!DOCTYPE html>
<html>
<head>
    
    <title>Parcijalni Ispit - Osnove PHP-a</title>
    <style>
        <style>
    body {
        font-family: Arial, sans-serif;
        margin: 30px;
    }
    h2 {
        margin-bottom: 20px;
    }
    form {
        float: left;
        margin-right: 40px;
    }
    table {
        float: left;
        border-collapse: collapse;
        min-width: 400px;
    }
    th, td {
        border: 1px solid black;
        padding: 8px 15px;
        text-align: center;
    }
    
    </style>
</head>
<body>
    <h2>Upisite zeljenu rijec:</h2>
    <form method="post">
        <label>Upisite rijec: </label>
        <input type="text" name="rijec">
        <input type="submit" value="pošalji">
    </form>

    <?php if($greska != ""): ?>
        <p class="greska"><?= $greska ?></p>
    <?php endif; ?>

    <table>
        <tr>
            <th>Rijec</th>
            <th>Broj slova</th>
            <th>Broj suglasnika</th>
            <th>Broj samoglasnika</th>
        </tr>
        <?php foreach($words as $w): ?>
        <tr>
            <td><?= htmlspecialchars($w["rijec"]) ?></td>
            <td><?= $w["slova"] ?></td>
            <td><?= $w["suglasnici"] ?></td>
            <td><?= $w["samoglasnici"] ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>