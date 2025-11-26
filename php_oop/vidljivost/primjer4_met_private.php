<?php

class BankovniRacun{
    private $saldo=1000;

    private function prikaziPIN(): void{
        echo "<br>Pin je : ".$this->pin;
    }

    public function prikaziSaldo(): mixed{
       echo "<br>Saldo: ".$this->saldo;
         $this->prikaziPIN();
    }

    private function povecajIznos(): void{
        echo "<br>Povecan saldo: ".$this->saldo *=rand(1,3);
    }
    public function prikaziPovecanIznos(): void{
        $this->povecajIznos();
    }
}


$rn=new BankovniRacun();
$rn->prikaziSaldo();
$rn->prikaziPovecanIznos();
$rn->povecajIznos(500); //Fatal error: Uncaught Error: Call to private method BankovniRacun::povecajIznos() from context ''

?>