<?php


require_once "kategorija.php";

class Proizvod extends Kategorija {
    public $nazivProizvoda;
    public $cijena;

    public function postaviProizvod($naziv, $cijena, $nazivK, $opisK) {
        $this->nazivProizvoda = $naziv;
        $this->cijena = $cijena;
        $this->postaviPodatke($nazivK, $opisK);
    }

    public function prikaziProizvod() {
        echo "<br>Proizvod: ".$this->nazivProizvoda;
        echo "<br>Cijena: ".$this->cijena;
        $this->prikaziKategoriju();
    }
}


?>
