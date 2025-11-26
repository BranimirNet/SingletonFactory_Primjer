<?php

class evidencijaStudenata{
    private $studenti = [];

    public function dodajStudenta(Student $student): void{
        $this->studenti[] = $student;
    }

    public function prikaziSve(): void{
        foreach($this->studenti as $s){
            $s->prikaziPodatke();
        }
    }
}





?>