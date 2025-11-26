<?php


class Korisnik{
    protected function prikaziRolu(): void{
        echo"Administrator";
    }

    
}


class Admin extends Korisnik{
    public function pozdrav(): void{
        echo"<br>Dobrodosao: ";
        $this->prikaziRolu();
    }
}

$a=new Admin();
$a->pozdrav();
$a->prikaziRolu(); // Ne moze se pristupiti jer je metoda protected
?>