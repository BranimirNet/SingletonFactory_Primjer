<?php

try{
    $conn=new mysqli ("localhost","classicweb","web123","classicmodels");
}
catch(Exception $ex){
    echo "<br>Greska kod povezivanja na bazu podataka: " . $ex->getMessage();
}
finally{
    echo "<br>Pokusaj konekcije zatvoren.";
}




?>