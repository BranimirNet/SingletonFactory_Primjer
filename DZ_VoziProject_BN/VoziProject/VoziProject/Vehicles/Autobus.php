<?php
namespace VoziProject\Vehicles;

class Autobus extends Vehicle
{
    public function __construct(string $naziv, int $maxBrzina, string $registracija)
    {
        $this->kategorija = 'D';
        parent::__construct($naziv, $maxBrzina, $registracija);
    }

    public function getInfo(): string
    {
        return "Autobus: {$this->naziv}, registracija: {$this->registracija}, max brzina: {$this->maxBrzina} km/h";
    }
}
