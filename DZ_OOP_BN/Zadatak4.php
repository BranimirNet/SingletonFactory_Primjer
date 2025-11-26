<?php


class Zaposlenik {
    public $ime;
    public $prezime;
    protected $osnovnaPlaca;
    private $bonus;

    public function postaviPlacu($placa, $bonus) {
        $this->osnovnaPlaca = $placa;
        $this->bonus = $bonus;
    }

    protected function izracunajUkupno() {
        return $this->osnovnaPlaca + $this->bonus;
    }
}

class Menadzer extends Zaposlenik {
    public function prikaziPlacu() {
        $ukupno = $this->izracunajUkupno();
        echo "<br>Menadzer: ".$this->ime." ".$this->prezime;
        echo "<br>Ukupna plaća: ".$ukupno;
    }
}

$menadzer = new Menadzer();
$menadzer->ime = "Ivana";
$menadzer->prezime = "Ivanić";
$menadzer->postaviPlacu(1000, 200);
$menadzer->prikaziPlacu();


?>