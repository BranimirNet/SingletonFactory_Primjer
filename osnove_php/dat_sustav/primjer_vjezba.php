<?php 

/*
u skripti nizovi.php nalaze se sljedeći nizovi:
$osobe sa imenima i prezimenima
$gradovi sa popisom gradova

potrebno je prvo provjeriti da li postoji daoteka osobe.json, ukoliko ne postoji, kreirati praznu datoteku

zatim je potrebno u datoteku osobe.json napuniti 10 zapisa sa sljedećim atributima: ime_prezime, grad, godina_rod,
placa i status_zaposlenja

ime_prezime pročitati random iz postojećeg niza osobe,
grad pročitati random iz postojećeg niza gradovi
godina_rod treba biti slučajna vrijednost između 1980 i 2010.
placa treba biti random između 2000 i 4000
status_zaposlenja treba biti true/false (vrijednost vratiti funkcijom koja će nasumično vratiti true/false)

zatim je potrebno podatke iz json datoteke pročitati u html tablicu.
*/

include "nizovi.php";

$datoteka = "osobe.json";

// Ako datoteka ne postoji, stvori praznu
if (!file_exists($datoteka)) {
    file_put_contents($datoteka, json_encode([]));
}

// Učitaj postojeće podatke
$podaci = json_decode(file_get_contents($datoteka), true);

// Funkcija koja nasumično vraća true ili false
function VratiStatusZap(): bool {
    return (bool)rand(0, 1);
}

// Dodaj 10 novih zapisa
for ($a = 1; $a <= 10; $a++) {
    $osoba = $osobe[array_rand($osobe)];      // nasumično ime i prezime
    $grad  = $gradovi[array_rand($gradovi)];  // nasumičan grad
    $godina_rod = rand(1980, 2010);
    $placa = rand(2000, 4000);
    $statusZap = VratiStatusZap();

    $podaci[] = [
        "ime_prezime"    => $osoba,
        "grad"           => $grad,
        "godina_rod"     => $godina_rod,
        "placa"          => (float)$placa,
        "status_zaposlenja" => $statusZap
    ];
}

// Spremi sve podatke natrag u datoteku
file_put_contents(
    $datoteka,
    json_encode($podaci, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE)
);
?>