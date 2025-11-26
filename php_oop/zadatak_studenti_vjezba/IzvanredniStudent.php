<?php

require_once "Student.php";

class IzvanredniStudent extends Student{

    public function izracunajECTS():float{
        return round(($this->brojDolazaka/$this->ukupnoPredavanja)*20,2);
    }

    public function statusStudenta():string{
        $ects = $this->izracunajECTS();

        return $ects >= 15 ? "Izvanredni student {$this->getFullName()} je položio kolegij ({$ects} ECTS)" : "Izvanredni student {$this->getFullName()} nije položio kolegij ({$ects} ECTS)";
    }

    
}

?>