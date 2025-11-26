<?php

function Zbrajanje($a,$b){
    return $a+$b;
}

function Oduzimanje($a,$b){
    return $a-$b;
}


function Mnozenje($a,$b){
    return $a*$b;
}


function Dijeljenje($a,$b){
    if($b!=0){
        return $a/$b;
    }
    else
    {
        return "Dijeljenje s nulom!";
    }
    
}


function Ostatak($a,$b){
        if($b!=0){
        return $a%$b;
    }
    else
    {
        return "Dijeljenje s nulom!";
    }
}


?>