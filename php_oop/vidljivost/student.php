<?php

class Student{
    
    public $ime;
    public $prezime;
    private $brojIndeksa;
    public function postaviPodatke($ime, $prezime, $brojIndeksa): void{
        $this->ime=$ime;
        $this->prezime=$prezime;
        $this->brojIndeksa=$brojIndeksa;
    }

    public function prikaziPodatke(): void{
        echo "<br>".$this->ime." ".$this->prezime." - ".$this->brojIndeksa;
       
}
}



?>