<?php



class Student {
    public $ime;
    public $prezime;
    public $godina;
    public $smjer;

    public function prikaziPodatke() {
        echo "<br>Ime: ".$this->ime;
        echo "<br>Prezime: ".$this->prezime;
        echo "<br>Godina studija: ".$this->godina;
        echo "<br>Smjer: ".$this->smjer;
    }
}

$student1 = new Student();
$student1->ime = "Ana";
$student1->prezime = "Anić";
$student1->godina = 1;
$student1->smjer = "Programiranje";

$student1->prikaziPodatke();



?>