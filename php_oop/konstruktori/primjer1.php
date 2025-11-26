<?php


//primjer oop metoda postavljanje

class Osoba {
    //svojstva
    public $ime;
    public $prezime;

    //konstruktor
    public function postaviPodatke($ime, $prezime): void {
        $this->ime = $ime;
        $this->prezime = $prezime;
    }
    public function ispisiPodatke(): void {
        echo "<br>Ime: " . $this->ime ." "."Prezime: " . $this->prezime;
    }
}

$os1 = new Osoba();
$os1->postaviPodatke("Marko", "Markovic");
$os1->ispisiPodatke();

class OsobaKonst{
    public $ime;
    public $prezime;

    //konstruktor
    public function __construct($ime, $prezime) {
        $this->ime = $ime;
        $this->prezime = $prezime;
    }

    public function ispisiPodatke(): void {
        echo "<br>Ime konst: " . $this->ime ." "."Prezime konst: " . $this->prezime;
    }
}


$os2 = new OsobaKonst("Ivo", "Ivic");
$os2->ispisiPodatke();
?>