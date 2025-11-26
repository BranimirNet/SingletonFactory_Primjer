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
        <label>Unesite customer number:</label>
        <input type="text" name="customerNumber" id="customerNumber">
    </div>
    <div>
        <label>Unesite customer name:</label>
        <input type="text" name="customerName" id="customerName">
    </div>
    <div>
        <label>Odaberite customer country:</label>
        <select name = "country" id="country">
            <option value="Croatia">Croatia</option>
            <option value="Slovenia">Slovenia</option>
            <option value="Germany">Germany</option>
        </select>
    </div>
    <br>
    <button type="submit" name="entity" value="customer">Spremi customer</button>
</form>
<p><a href="index.php">Glavni izbornik</a></p>
</body>
</html>