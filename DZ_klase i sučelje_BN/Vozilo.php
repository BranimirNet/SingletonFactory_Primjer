<?php

abstract class Vozilo {

    protected string $marka;
    protected string $model;
    protected int $godinaProizvodnje;
    protected float $potrosnja;

    public function __construct(string $marka, string $model, int $godina, float $potrosnja)
    {
        $this->marka = $marka;
        $this->model = $model;
        $this->godinaProizvodnje = $godina;
        $this->potrosnja = $potrosnja;
    }

    abstract public function prikaziInfo(): void;

    public function getStarost(): int
    {
        return date("Y") - $this->godinaProizvodnje;
    }

    public function __toString(): string
    {
        return "{$this->marka} {$this->model} ({$this->godinaProizvodnje})";
    }

}