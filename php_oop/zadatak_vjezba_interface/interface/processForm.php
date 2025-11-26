<?php 

require_once "classes/Ispit.php";

$studenti=json_decode(file_get_contents('student.json'), true);
$kolegiji=json_decode(file_get_contents('kolegij.json'), true);

$mbr="1004";
$kolegijid="W403";
$datum_vrijeme="2025-06-15 08:00";
$polozio="da";

$studentData=array_filter($studenti, fn($s) => $s['mbr'] === $mbr);
$kolegijData=array_filter($kolegiji, fn($s) => $s['kolegijid'] === $kolegijid);

if(empty($studentData) || empty($kolegijData)) {
    die("Student ili kolegij ne postoje.");
}

$student = new Student(...array_values($studentData)[0]);
$kolegij = new Kolegij(...array_values($kolegijData)[0]);

$ispit = new Ispit($student, $kolegij, $datum_vrijeme, $polozio);
$ispit->zapisiJSON();

echo"<br>Ispit uspjesno evidentiran.</br>";
?>