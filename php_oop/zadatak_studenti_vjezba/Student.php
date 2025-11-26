<?php

abstract class Student{

    protected string $ime;

    protected string $prezime;
    protected int $brojDolazaka;
    protected int $ukupnoPredavanja;

    public function __construct($ime,$prezime,$brojDolazaka,$ukupnoPredavanja){
        $this->ime = $ime;
        $this->prezime = $prezime;
        $this->brojDolazaka=$brojDolazaka;
        $this->ukupnoPredavanja=$ukupnoPredavanja;
    }

    abstract public function izracunajECTS();
    abstract public function statusStudenta();

    public function getFullName(): string{
            return "{$this->ime} {$this->prezime}";
    }
}

?>