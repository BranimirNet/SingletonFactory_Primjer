<?php

try{
    echo 10/0;
}
catch(DivisionByZeroError $e){
    echo "Nije dozvoljeno dijeliti sa nulom.";
}
finally{
    echo "\nOvo se uvijek izvrsava.";
}





?>