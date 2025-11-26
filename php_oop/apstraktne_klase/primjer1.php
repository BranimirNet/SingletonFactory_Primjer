<?php

abstract class Vozilo{

    protected $marka;

    public function __construct($marka){
        $this->marka=$marka;
    }

    abstract public function pokreni();

    public function info(){
        echo "<br>Ovo je vozilo marke ".$this->marka;
    }
}

class Auto extends Vozilo{

    public function pokreni(){
        echo "<br>Auto ".$this->marka." se pokreće pomoću ključa!";
    }
}

class Motor extends Vozilo{

    public function pokreni(){
        echo "<br>Motor ".$this->marka." se pokreće pomoću tipke START!";
    }
}

$auto = new Auto("Toyota");
$auto->info();
$auto->pokreni();

$motor = new Motor("Kawasaki");
$motor->info();
$motor->pokreni();

?>