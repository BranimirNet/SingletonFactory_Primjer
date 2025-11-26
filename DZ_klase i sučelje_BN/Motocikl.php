<?php
require_once "Vozilo.php";
require_once "EkoStandard.php";

class Motocikl extends Vozilo implements EkoStandard {

    private int $kubikaza;

    public function __construct(string $marka, string $model, int $godina, float $potrosnja, int $kubikaza)
    {
        parent::__construct($marka, $model, $godina, $potrosnja);
        $this->kubikaza = $kubikaza;
    }

    public function izracunajEmisiju(): float
    {
        return $this->potrosnja * 15;
    }

    public function isEko(): bool
    {
        return $this->izracunajEmisiju() < 100;
    }

    public function prikaziInfo(): void
    {
        echo "<h3>Motocikl</h3>";
        echo $this . "<br>";
        echo "<br>Kubikaža: {$this->kubikaza}";
        echo "<br>Potrošnja: {$this->potrosnja} L/100";
        echo "<br>Emisija: " . $this->izracunajEmisiju() . "g/km";
        echo "<br>EKO status: " . ($this->isEko() ? "EKO vozilo" : "Nije EKO");
    }
}