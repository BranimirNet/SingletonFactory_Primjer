<?php

class Osoba{

    public $ime="Ana";
    public function pozdrav($ime): void{
        $this->ime=$ime;
    }
    public function prikazipodatke(): void{
        echo "<br>Osoba je: ".$this->ime;
    }
}

$os1 = new Osoba();
$os1->prikazipodatke();

$os2 = new Osoba();
$os2->pozdrav("Pero");
$os2->prikazipodatke();

$os3 = new Osoba();
$os3->pozdrav("Damir");
$os3->prikazipodatke();

?>