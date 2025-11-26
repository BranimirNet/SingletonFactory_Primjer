<?php

require_once "Student.php";

class RedovitiStudent extends Student{

    public function izracunajECTS():float{
        return round(($this->brojDolazaka/$this->ukupnoPredavanja)*30,2);
    }

    public function statusStudenta():string{
        $ects = $this->izracunajECTS();

        return $ects >= 15 ? "Redoviti student {$this->getFullName()} je položio kolegij ({$ects} ECTS)" : "Redoviti student {$this->getFullName()} nijeje položio kolegij ({$ects} ECTS)";
    }

    
}

?>