<?php

class Test {
    public $brojka;
    public $pocetak;

    public function __construct($brojka = 10) {
        echo "<br>Konstruktor je stvoren";
        $this->pocetak = 1;
        $this->brojka = $brojka;
    }

    public function Ispisi(): void {
        for ($this->pocetak; $this->pocetak <= $this->brojka; $this->pocetak++) {
            echo "<br>" . $this->pocetak;
        }
    }

    public function __destruct() {
        echo "<br>Destruktor: Objekt se uništava";
    }
}

$t1 = new Test();
$t1->Ispisi();

?>
