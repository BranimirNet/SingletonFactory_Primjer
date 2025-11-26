<?php

class Osoba{

    public $ime;
    public $prezime;
    public $godiste;

    public function predstavise(): void{
        echo"<br>Ja sam ".$this->ime.", ".$this->prezime;
    }

    public function punoljetan(): string{
        if((date("Y")-$this->godiste)>=18){
           return "DA";
    }
    else{
        return "NE";
    }
    }
}

class Student extends Osoba{

    public $fakultet;
    public $godina;

    public function predstavisekaostudent(): void{
        $this->predstavise();
        echo"<br>Studiram na fakultetu: ".$this->fakultet.",
        na godini studija: ".$this->godina;
    }
}



$os1 = new Osoba();
$os1->ime="Pero";
$os1->prezime="Perić";
$os1->predstavise();

$os2 = new Student();
$os2->ime="Iva";    
$os2->prezime="Ivić";
$os2->fakultet="Fakultet informatike";
$os2->godina=2;
$os2->godiste=1995;
echo "<br>Punoljetan: " . $os2->punoljetan();
$os2->predstavisekaostudent();
?>