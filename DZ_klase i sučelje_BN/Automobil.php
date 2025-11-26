<?php
require_once "Vozilo.php";
require_once "EkoStandard.php";

class Automobil extends Vozilo implements EkoStandard {

    private int $brojVrata;

    public function __construct(string $marka, string $model, int $godina, float $potrosnja, int $brojVrata)
    {
        parent::__construct($marka, $model, $godina, $potrosnja);
        $this->brojVrata = $brojVrata;
    }

    public function izracunajEmisiju(): float
    {
        return $this->potrosnja * 20;
    }

    public function isEko(): bool
    {
        return $this->izracunajEmisiju() < 120;
    }

    public function prikaziInfo(): void
    {
        echo "<h3>Automobil</h3>";
        echo $this . "<br>";
        echo "<br>Broj vrata: {$this->brojVrata}";
        echo "<br>Potrošnja: {$this->potrosnja} L/100 km";
        echo "<br>Emisija: " . $this->izracunajEmisiju() . "g/km";
        echo "<br>EKO status: " . ($this->isEko() ? "EKO vozilo" : "Nije EKO");
    }
}