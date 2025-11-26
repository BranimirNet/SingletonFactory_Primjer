<?php

try{
    if(!file_exists("Podaci.json")){
        throw new Exception("Datoteka ne postoji.");
    }

$data=file_get_contents("Podaci.json");
echo $data;



}
catch(Exception $e){
    echo "<br>Greska: " . $e->getMessage();
    echo "<br>Linija: " . $e->getLine();
    echo "<br>Greska u datoteci: " . $e->getFile();

}





?>