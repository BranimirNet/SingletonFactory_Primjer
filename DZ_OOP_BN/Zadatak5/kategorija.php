<?php


class Kategorija {
    public $naziv;
    public $opis;

    public function postaviPodatke($naziv, $opis) {
        $this->naziv = $naziv;
        $this->opis = $opis;
    }

    public function prikaziKategoriju() {
        echo "<br>Kategorija: ".$this->naziv;
        echo "<br>Opis: ".$this->opis;
    }
}


?>