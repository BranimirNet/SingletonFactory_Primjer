<!DOCTYPE html>
<html>
    <head>
        
        <title>Vjezba PETLJE</title>
    </head>
    <body>
        <?php
/*
potrebno je dobiti slučajni broj između 1 i 10.
ako je broj manji od 5,
potrebno je ispisati sve brojeve od tog broja do 5, inače je potrebno vrijednost "Zagreb" ispisati onoliko
puta kolika je vrijednost dobivenog broja
*/

$broj=rand(1,10);

if($broj<5){
    while($broj<=5){
        echo $broj++.",";
    }
}
else
{
    $a=1;
    while($a<=$broj){
        echo "<br>Zagreb";
        $a++;
    }
}
?>

    </body>
</html>