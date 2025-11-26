<?php

class Ects {
    public string $mbr;
    public int $ects_ukupno;

    public function __construct($mbr, $ects_ukupno) {
        $this->mbr = $mbr;
        $this->ects_ukupno = $ects_ukupno;
    }
}

?>
