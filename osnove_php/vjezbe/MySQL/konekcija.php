<?php
$server = "localhost";
$korisnik = "root";   // default u XAMPP-u
$lozinka = "";
$baza = "moja_baza";  // baza koju si stvorio u phpMyAdminu

$conn = new mysqli($server, $korisnik, $lozinka, $baza);

if ($conn->connect_error) {
    die("Greška pri spajanju: " . $conn->connect_error);
}

echo "Uspješno spojeno!";
?>