<?php

function zbrajanje($a, $b) {
    return $a + $b;
}

function oduzimanje($a, $b) {
    return $a - $b;
}

function mnozenje($a, $b) {
    return $a * $b;
}

function dijeljenje($a, $b) {
    if ($b == 0) {
        return "Greška: dijeljenje s nulom nije dopušteno!";
    }
    return $a / $b;
}

function ostatak($a, $b) {
    if ($b == 0) {
        return "Greška: ostatak pri dijeljenju s nulom nije dopušten!";
    }
    return $a % $b;
}
?>