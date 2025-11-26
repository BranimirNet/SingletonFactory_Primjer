<?php


class BankovniRacun {
    private $stanje = 0;

    public function uplati($iznos) {
        $this->stanje += $iznos;
        echo "<br>Uplaćeno: ".$iznos;
        echo "<br>Trenutno stanje: ".$this->provjeriStanje();
    }

    public function podigni($iznos) {
        if ($this->stanje - $iznos < 0) {
            echo "<br>Greška: Nedovoljno sredstava!";
             } 
            else 
            {
            $this->stanje -= $iznos;
            echo "<br>Podignuto: ".$iznos;
            echo "<br>Trenutno stanje: ".$this->provjeriStanje();
        }
    }

    private function provjeriStanje() {
        return $this->stanje;
    }
}

$racun = new BankovniRacun();
$racun->uplati(100);
$racun->podigni(100);
$racun->podigni(500);


?>