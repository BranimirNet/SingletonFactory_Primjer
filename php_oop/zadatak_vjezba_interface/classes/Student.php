<?php

class Student {
    public string $mbr;
    public string $ime;
    public string $prezime;
    public string $status;

    public function __construct($mbr, $ime, $prezime, $status) {
        $this->mbr = $mbr;
        $this->ime = $ime;
        $this->prezime = $prezime;
        $this->status = $status;
    }
}

?>
