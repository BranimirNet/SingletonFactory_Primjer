<?php
class Student {
    public $ime;
    public $godinaStudija;

    public function __construct($ime, $godinaStudija) {
        $this->ime = $ime;
        $this->godinaStudija = $godinaStudija;
        echo "<br>Student: " . $this->ime . ", godina studija " . $this->godinaStudija . " je registriran!";
    }

    public function prikazi(): void {
        echo "<br>Ime: " . $this->ime . ", godina: " . $this->godinaStudija;
    }

    public function DodajGodinu(): void {
       echo "<br> Nova godina studija: ".$this->godinaStudija+2;
    }

    public function __destruct() {
        echo "<br>Objekt studenta " . $this->ime . " je uništen";
    }
}

$s1 = new Student("Ana", 2);
$s1->prikazi();
$s1->DodajGodinu();

$s2 = new Student("Marko", 5);
$s2->prikazi();
$s2->DodajGodinu();
?>
