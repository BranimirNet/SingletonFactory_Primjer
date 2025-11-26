<?php
namespace Vehicles;

class Kamion extends Vehicle
{
    public function __construct(string $naziv, int $maxBrzina, string $registracija)
    {
        $this->kategorija = 'C';
        parent::__construct($naziv, $maxBrzina, $registracija);
    }

    public function getInfo(): string
    {
        return "Kamion: {$this->naziv}, registracija: {$this->registracija}, max brzina: {$this->maxBrzina} km/h";
    }
}
