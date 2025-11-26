<?php

require_once "Logger.php";
require_once "FileLoader.php";

$loader=new FileLoader();
$logger=new Logger();

try{
    $content=$loader->load("data.txt");
    echo nl2br($content);
    $logger->log("Uspješno učitana datoteka: data.txt");
} catch(Exception $ex){
    echo "<br>Greška: " . $ex->getMessage();
    $logger->log("Greška pri učitavanju datoteke: " . $ex->getMessage());
} finally {
    echo "<br>Operacija učitavanja datoteke završena.";
}   






?>