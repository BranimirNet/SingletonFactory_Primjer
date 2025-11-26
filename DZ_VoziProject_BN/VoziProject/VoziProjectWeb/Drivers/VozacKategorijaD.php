<?php
namespace Drivers;

class VozacKategorijaD extends Vozac
{
    public function __construct(string $ime, string $prezime)
    {
        parent::__construct($ime, $prezime, 'D');
    }
}
