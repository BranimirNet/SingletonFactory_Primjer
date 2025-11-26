<?php 

interface Logger{
    public function logiraj($poruka): void;
}

abstract class ObradaPodataka implements Logger{
    protected string $naziv;

    public function __construct($naziv){
        $this->naziv=$naziv;
    }

    public function logiraj($poruka): void{
        echo "<br>Poruka sadrzaja {$poruka} zapisana u ".date("Y-m-d H:i:s");
    }
    
abstract public function obradi();
}

class ObradaNarudzbi extends ObradaPodataka{
    public function obradi(): void{
        $this->logiraj("<b>Obrada narudzbi br. 15322 za pocetak</b>");
        echo "<br>Obradujem narudzbu za {$this->naziv}";
        sleep(3); // Simulacija duze obrade
        $this->logiraj("<b>Obrada narudzbi br. 15322 zavrsena</b>");
    }
    }

        $obrada = new ObradaNarudzbi("ClassicModels");
        $obrada->obradi();




?>