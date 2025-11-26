<?php

function UcitajKorisnike(){
    $file="userData.json";
    $podaci = file_exists($file) ? json_decode(file_get_contents($file),true) : [];
    return $podaci;
}

?>