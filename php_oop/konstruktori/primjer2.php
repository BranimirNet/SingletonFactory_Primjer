<?php

class Korisnik{
    public $ime;
    public $status;

    public function __construct($ime="Nepoznato",$status="Novi") {
        $this->ime = $ime;
        $this->status = $status;
    }
    public function prikaziPodatke(): void {
        echo "<br>Korisnik: " . $this->ime . " Status: " . $this->status;
    }
}

$k1 = new Korisnik();
$k1->prikaziPodatke();

$k2 = new Korisnik("Ana", "Aktivan");
$k2->prikaziPodatke();
?>