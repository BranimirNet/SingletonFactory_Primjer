<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <title>OrdersProject - Dodavanje employee</title>
    <link rel="stylesheet" href="stil.css">
</head>
<body>
<h2>Dodaj novi zapis</h2>
<form action="processForm.php" method="POST">
    <hr>
    <div>
        <label>Unesite employee broj:</label>
        <input type="text" name="employeeNumber" id="employeeNumber">
    </div>
    <div>
        <label>Unesite employee ime:</label>
        <input type="text" name="firstName" id="firstName">
    </div>
    <div>
        <label>Unesite employee prezime:</label>
        <input type="text" name="lastName" id="lastName">
    </div>
        <div>
        <label>Unesite employee email:</label>
        <input type="text" name="email" id="email">
    </div>
    <br>
    <button type="submit" name="entity" value="employee">Spremi employee</button>
</form>
<p><a href="index.php">Glavni izbornik</a></p>
</body>
</html>