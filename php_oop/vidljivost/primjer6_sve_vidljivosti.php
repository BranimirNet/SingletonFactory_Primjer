<?php

class Osoba{
    public $ime = "Ana";
    protected $email = "ana@mail.com";
    private $oib = "12345678901";


    public function javnaMetoda(): void{
        echo "<br>Javna metoda";
        $this->zasticenaMetoda();
        $this->privatnaMetoda();


        
    }

    protected function zasticenaMetoda(): void{
        echo "<br>Zaštićena metoda";
    }

    private function privatnaMetoda(): void{
        echo "<br>Privatna metoda";
}
}

class Zaposlenik extends Osoba{
    public function testirajprikaz(): void{
        echo $this->ime; // Može se pristupiti jer je varijabla public
        echo "<br>Email: ".$this->email; // Može se pristupiti jer je varijabla protected
       // echo $this->oib; // Ne može se pristupiti jer je varijabla private
       
        $this->zasticenaMetoda(); // Može se pristupiti jer je metoda protected
        //$this->privatnaMetoda(); // Ne može se pristupiti jer je metoda private
    
    }
}

$o1 = new Osoba();
$o1->javnaMetoda(); // Može se pristupiti jer je metoda public
//$o1->zasticenaMetoda(); // Ne može se pristupiti jer je metoda protected
//$o1->privatnaMetoda(); // Ne može se pristupiti jer je metoda private

$z1 = new Zaposlenik();
$z1->testirajprikaz();

/* 
public - dostupno svugdje
protected - dostupno unutar klase i njenih podklasa 
private - dostupno samo unutar klase
*/
?>