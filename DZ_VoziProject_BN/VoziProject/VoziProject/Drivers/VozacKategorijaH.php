<?php
namespace VoziProject\Drivers;

class VozacKategorijaH extends Vozac
{
    public function __construct(string $ime, string $prezime)
    {
        parent::__construct($ime, $prezime, 'H');
    }
}
