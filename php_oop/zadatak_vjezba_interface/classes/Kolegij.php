<?php

class Kolegij {
    public string $kolegijid;
    public string $naziv;
    public string $ects_bodovi;

    public function __construct($kolegijid, $naziv, $ects_bodovi) {
        $this->kolegijid = $kolegijid;
        $this->naziv = $naziv;
        $this->ects_bodovi = $ects_bodovi;
    }
}

?>
