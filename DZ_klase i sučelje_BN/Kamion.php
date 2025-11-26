<?php
require_once "Vozilo.php";
require_once "EkoStandard.php";

class Kamion extends Vozilo implements EkoStandard {

    private float $nosivost; // tone

    public function __construct(string $marka, string $model, int $godina, float $potrosnja, float $nosivost)
    {
        parent::__construct($marka, $model, $godina, $potrosnja);
        $this->nosivost = $nosivost;
    }

    public function izracunajEmisiju(): float
    {
        return $this->potrosnja * 25;
    }

    public function isEko(): bool
    {
        return $this->izracunajEmisiju() < 180;
    }

    public function prikaziInfo(): void
    {
        echo "<h3>Kamion</h3>";
        echo $this . "<br>";
        echo "<br>Nosivost: {$this->nosivost} t";
        echo "<br>Potrošnja: {$this->potrosnja} L/100 km";
        echo "<br>Emisija: " . $this->izracunajEmisiju() . "g/km";
        echo "<br>EKO status: " . ($this->isEko() ? "EKO vozilo" : "Nije EKO");
    }
}