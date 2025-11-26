<?php

class Kalkulator {
    public function dijeli($a, $b) {
        if ($b == 0) {
            throw new Exception("Dijeljenje nulom nije dozvoljeno.");
        }
        return $a / $b;
    }
}





?>