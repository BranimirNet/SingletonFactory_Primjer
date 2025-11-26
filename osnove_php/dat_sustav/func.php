<?php

function VratiStatusZap(): bool{

    $ind = rand(1,2);

    return $ind == 1 ? true : false;
}

?>