<?php
class Osoba {
    public $ime;
    public $prezime;

    public function predstaviSe() {
        echo "<br>Ja sam ".$this->ime." ".$this->prezime;
    }
}

class Student extends Osoba {
    public $fakultet;
    public $godina;

    public function predstaviSeKaoStudent() {
        $this->predstaviSe();
      echo "<br>Studiram na fakultetu ".$this->fakultet. ", " .$this->godina . "godina";
    }
}

$student = new Student();
$student->ime = "Branimir";
$student->prezime = "Branimirić";
$student->fakultet = "Sveučilište Algebra";
$student->godina = 1;

$student->predstaviSe();
$student->predstaviSeKaoStudent();
?>