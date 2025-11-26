<?php

class Radnik{
    private string $ime;

    public function setIme($ime) {
        if(strlen($ime)<2){
            throw new Exception("Ime mora imati najmanje 2 znaka.");
        }
        $this->ime=$ime;
    }
}

try{
    $radnik=new Radnik();
    $radnik->setIme("P");
}
catch(Exception $ex){
    echo "<br>Greska kod stavljanja imena: " . $ex->getMessage();
}
finally{
    echo "\nKraj programa.";
}



?>