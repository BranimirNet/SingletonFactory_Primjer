<?php

$knjigeJSON = file_get_contents("knjige.json");
print_r($knjigeJSON);

$knjige = json_decode($knjigeJSON,true);

print_r($knjige);

echo "<br>Čitanje niza:</br>";
foreach($knjige as $knjiga){
echo "<br>Naziv knjige: ".$knjiga["naziv"];
echo "<br>Autor knjige: ".$knjiga ["autor"];
echo "<br>Dostupnost knjige: ".$knjiga ["dostupnost"];
echo "<br>Stranice: ".$knjiga ["stranice"];
echo "<br>Godina: ".$knjiga["godina"];
echo "<hr>";
}
?>