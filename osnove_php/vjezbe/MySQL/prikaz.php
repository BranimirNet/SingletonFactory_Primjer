<?php
// 1. Spoji se na bazu
$servername = "localhost";
$username = "root";       // ako nisi mijenjao u XAMPP-u
$password = "";           // prazno ako nemaš lozinku
$dbname = "moja_baza";    // promijeni u ime tvoje baze

$conn = new mysqli($servername, $username, $password, $dbname);

// Provjeri spajanje
if ($conn->connect_error) {
    die("Greška pri spajanju: " . $conn->connect_error);
}

// 2. Izvuci sve iz tablice korisnici
$sql = "SELECT * FROM korisnici";
$rezultat = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Prikaz korisnika</title>
    <style>
        table {
            border-collapse: collapse;
            width: 60%;
            margin: 20px auto;
            background: #f8f8f8;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 8px 12px;
            text-align: left;
        }
        th {
            background: #ddd;
        }
    </style>
</head>
<body>

<h2 style="text-align:center;">Popis korisnika</h2>

<table>
    <tr>
        <th>ID</th>
        <th>Ime</th>
        <th>Email</th>
    </tr>

<?php
// 3. Prikaz rezultata
if ($rezultat->num_rows > 0) {
    while($red = $rezultat->fetch_assoc()) {
        echo "<tr>
                <td>{$red['id']}</td>
                <td>{$red['ime']}</td>
                <td>{$red['email']}</td>
              </tr>";
    }
} else {
    echo "<tr><td colspan='3'>Nema podataka u tablici.</td></tr>";
}
$conn->close();
?>
</table>

</body>
</html>