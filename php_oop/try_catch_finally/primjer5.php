<?php

class NegativeNumberException extends Exception {}

function kvadratniKorijen($broj){
    if($broj<0){
        throw new NegativeNumberException("Negativan broj nema realan kvadratni korijen.");
    }
    return sqrt($broj);
}

try {
    echo kvadratniKorijen(-4);
}
catch(NegativeNumberException $exp){
    echo "<br>Greska: " . $exp->getMessage();
}
finally{
    echo "\nKraj izvrsavanja programa.";
}





?>