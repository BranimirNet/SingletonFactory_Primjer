<?php

function pozdrav($ime): string {
    return "<br>OOP Pozdrav: ".$ime;
}

function VratiPlacu($placa): float {
    return (float)$placa;
}

function Doprinosi($iznos): float {
    return (float)($iznos * 0.2);
}

echo pozdrav("Ana");
$placa = VratiPlacu(5223.46);
echo "<br>Vasa placa je: ".$placa.", doprinosi su: ".Doprinosi($placa);

echo pozdrav("Pero");
$placa = VratiPlacu(3223.46);
echo "<br>Vasa placa je: ".$placa.", doprinosi su: ".Doprinosi($placa);

class Zaposlenik {

    public $ime;
    public $placa;
    public $doprinosi;

    public function pozdrav(): string {
        return "<br>OOP Pozdrav: ".$this->ime;
    }

    public function VratiPlacu($placa): void {
        $this->placa = $placa;
        $this->doprinosi = $this->placa * 0.2;
    }

    public function PrikaziIzracun(): void {
        echo "<br>Placa je: ".$this->placa;
        echo "<br>Doprinosi su: ".$this->doprinosi;
    }

    public function UpisiStarost($datumRod): void{
        $this->datumRod = $datumRod;
    }

    public function VratiStarost(): int {
    return date("Y") - date("Y", strtotime($this->datumRod));
}
}

$zap1 = new Zaposlenik();
$zap1->ime = "Ana";
$zap1->placa = 5223.46;
$zap1->VratiPlacu($zap1->placa);
$zap1->PrikaziIzracun();
$zap1->UpisiStarost("12.03.1995");
echo "<br>Starost: ".$zap1->VratiStarost();

$zap2 = new Zaposlenik();
$zap2->ime = "Pero";
$zap2->placa = 3223.46;
$zap2->VratiPlacu($zap2->placa);
$zap2->PrikaziIzracun();
$zap2->datumRod="25.10.2000";
echo "<br>Starost: ".$zap2->VratiStarost();
?>
