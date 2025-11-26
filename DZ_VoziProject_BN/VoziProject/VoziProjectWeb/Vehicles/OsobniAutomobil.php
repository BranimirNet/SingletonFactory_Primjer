<?php
namespace Vehicles;

class OsobniAutomobil extends Vehicle
{
    public function __construct(string $naziv, int $maxBrzina, string $registracija)
    {
        $this->kategorija = 'B';
        parent::__construct($naziv, $maxBrzina, $registracija);
    }

    public function getInfo(): string
    {
        return "Osobni automobil: {$this->naziv}, registracija: {$this->registracija}, max brzina: {$this->maxBrzina} km/h";
    }
}
