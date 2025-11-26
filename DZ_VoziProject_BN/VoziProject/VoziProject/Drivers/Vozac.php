<?php
namespace VoziProject\Drivers;

use VoziProject\Interfaces\IVozi;
use VoziProject\Vehicles\Vehicle;
use VoziProject\Exceptions\VehicleException;

class Vozac implements IVozi
{
    protected string $ime;
    protected string $prezime;
    protected string $kategorija;

    public function __construct(string $ime, string $prezime, string $kategorija)
    {
        $ime = trim($ime);
        $prezime = trim($prezime);

        if (mb_strlen($ime) < 2) {
            throw new \InvalidArgumentException("Ime mora imati najmanje 2 znaka.");
        }
        if (mb_strlen($prezime) < 2) {
            throw new \InvalidArgumentException("Prezime mora imati najmanje 2 znaka.");
        }

        $this->ime = $ime;
        $this->prezime = $prezime;
        $this->kategorija = $kategorija;

        echo "[Konstruktor] Kreiran vozač: {$this->ime} {$this->prezime}, kategorija: {$this->kategorija}\n";
    }

    public function __destruct()
    {
        echo "[Destruktor] Uništavam vozača: {$this->ime} {$this->prezime}\n";
    }

    public function vozi(Vehicle $v): string
    {
        if ($this->kategorija !== $v->getCategory()) {
            throw new VehicleException("Vozač {$this->ime} {$this->prezime} nema dozvolu za vozilo kategorije {$v->getCategory()}.") ;
        }

        $msg = "Vozač {$this->ime} {$this->prezime} uspješno vozi vozilo: " . $v->getNaziv() . " ({" . $v->getRegistracija() . "})";
        echo $msg . "\n";
        return $msg;
    }

    public function getKategorija(): string
    {
        return $this->kategorija;
    }
}
