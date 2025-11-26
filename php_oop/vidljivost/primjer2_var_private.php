<?php

class BankovniRacun{
    private $saldo=1000;

    public function prikaziSaldo(): mixed{
       return $this->saldo;
    }

public function povecajIznos($iznos): bool{
    if($iznos<500){
        echo"<br>Iznos mora biti minimalno 500";
    }
    else{
        $this->saldo += $iznos;
        echo"<br>Uspjesan polog od ".$iznos;
        return true;
    }
}
}


$racun = new BankovniRacun();
$racun->povecajIznos(700);
echo "<br>Saldo iznosi: ".$racun->prikaziSaldo();
?>