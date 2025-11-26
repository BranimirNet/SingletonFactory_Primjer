<?php
namespace Drivers;

class VozacKategorijaC extends Vozac
{
    public function __construct(string $ime, string $prezime)
    {
        parent::__construct($ime, $prezime, 'C');
    }
}
