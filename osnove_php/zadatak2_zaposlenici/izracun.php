<?php

$broj1=$_POST["broj1"];
$broj2=$_POST["broj2"];

if((is_numeric($broj1) || is_float($broj1)) && (is_numeric($broj2) || is_float($broj2))){

$operacija=$_POST["operacija"];

include_once "func.php";

switch($operacija){

    case "z":
        echo "<br>Zbrajanje: ".Zbrajanje($broj1,$broj2);
        break;
        case "o":
        echo "<br>Oduzimanje: ".Oduzimanje($broj1,$broj2);
        break;
        case "m":
        echo "<br>Množenje: ".Mnozenje($broj1,$broj2);
        break;
        case "d":
        echo "<br>Dijeljenje: ".Dijeljenje($broj1,$broj2);
        break;
        case "mod":
        echo "<br>Ostatak: ".Ostatak($broj1,$broj2);
        break;
}
}
else
{
    echo "<br>Brojevi nisu numeric";
}
?>