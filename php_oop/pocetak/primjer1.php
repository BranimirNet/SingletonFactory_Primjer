<?php

function pozdrav($ime): string{
    return "<br>Pozdrav (proc) : ".$ime;
}

echo pozdrav("Ana");
echo pozdrav("BMW");

class osoba{

    public $ime; //svojstvo objekta Osoba

    public function pozdrav(): string{
        return "<br>OOP Pozdrav: ".$this->ime;
    }
}

$osoba1 = new Osoba();
$osoba1->ime = "Ana";
echo $osoba1->pozdrav();

$osoba2 = new Osoba();
$osoba2->ime = "Pero";
echo $osoba2->pozdrav();

?>