<?php

class BankovniRacun{

    private $saldo=500;
}

class StudentskiRacun extends BankovniRacun{
    
    public function prikazi(): string{
        /*return $this->saldo;*/
        return "Nije moguce pristupiti varijabli saldo jer je deklarirana kao private u roditeljskoj klasi BankovniRacun";
    }
}

$s1=new StudentskiRacun();
echo"<br>Rezultat: ".$s1->prikazi();


class ZasticeniRacun{
    protected $saldo=500;

    public Prikazi(): mixed{
        return $this->saldo;
    }
}

class OtvoreniRacun extends ZasticeniRacun{
    
    public function prikazisaldo(): string{
        return $this->saldo;
    }
}

$r2=new OtvoreniRacun();
echo "<br>Otvoreni racun saldo: ".$r2->prikazisaldo();
?> 