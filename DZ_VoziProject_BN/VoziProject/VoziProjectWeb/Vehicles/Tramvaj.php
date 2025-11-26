<?php
namespace Vehicles;

class Tramvaj extends Vehicle
{
    public function __construct(string $naziv, int $maxBrzina, string $registracija)
    {
        $this->kategorija = 'H';
        parent::__construct($naziv, $maxBrzina, $registracija);
    }

    public function getInfo(): string
    {
        return "Tramvaj: {$this->naziv}, registracija: {$this->registracija}, max brzina: {$this->maxBrzina} km/h";
    }
}
