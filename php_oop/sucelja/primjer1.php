<?php 

interface Spremanje{
    public function spremi($podatak): void;
}

class SpremiUBazu implements Spremanje{
    public function spremi($podatak): void{
        echo "<br>Spremam ".$podatak." u bazu podataka.";
    }
}

class SpremiUJson implements Spremanje{
    public function spremi($podatak): void{
        echo "<br>Spremam ".$podatak." u JSON datoteku.";
    }
}

$metoda1=new SpremiUBazu();
$metoda1->spremi("Zaposlenik: Marko");

$metoda2=new SpremiUJson();
$metoda2->spremi("Zaposlenik: Ana");



?>