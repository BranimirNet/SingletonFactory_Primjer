<?php

$knjigeJSON = filegetcontents(__DIR__.'/knjige.json');

$knjige = json_decode($knjigeJSON, true);

print_r($knjige);

$knjige[]=[
"naziv"=>"Algoritmi u primjeni",
"autor"=>"Oliver Code",
"dostupnost"=>true,
"stranice"=>859,
"godina"=>2022
];

$knjigeJSON-json_encode($knjige, JSON_PRETTY_PRINT);

file_put_contents(__DIR__.'/knjige.json',$knjigeJSON)

?>