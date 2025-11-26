<?php

require_once __DIR__ . '/../interface/EvidencijaInterface.php';
require_once 'Student.php';
require_once 'Kolegij.php';
require_once 'Ects.php';

class Ispit implements EvidencijaInterface {
    private Student $student;
    private Kolegij $kolegij;
    private string $datum_vrijeme;
    private string $polozio;
    private string $ispitiFile = __DIR__ . '/../../ispiti.json';
    private string $bodoviFile = __DIR__ . '/../../bodovi.json';

    public function __construct(Student $student, Kolegij $kolegij, $datum_vrijeme, $polozio) {
        $this->student = $student;
        $this->kolegij = $kolegij;
        $this->datum_vrijeme = $datum_vrijeme;
        $this->polozio = $polozio;
    }

    public function evidentiraj_ispit(): void {
        $ispiti = file_exists($this->ispitiFile) ? json_decode(file_get_contents($this->ispitiFile), true) : [];
        $ispiti[] = [
            'mbr' => $this->student->mbr,
            'kolegijid' => $this->kolegij->kolegijid,
            'datum_vrijeme' => $this->datum_vrijeme,
            'polozio' => $this->polozio
        ];
        file_put_contents($this->ispitiFile, json_encode($ispiti, JSON_PRETTY_PRINT));
    }

    public function evidentiraj_ects_bodove(): void {
        if($this->polozio !== 'da')  return;

        $bodovi=file_exists($this->bodoviFile) ? json_decode(file_get_contents($this->bodoviFile), true) : [];
        $ects_za_kolegij=$this->kolegij->ects_bodovi;
        $found = false;

        foreach ($bodovi as &$b) {
            if ($b['mbr'] === $this->student->mbr) {
                $b['ects_ukupno'] += (int)$ects_za_kolegij;
                $found = true;
                break;
            }
        }
        if (!$found) {
            $bodovi[] = [
                'mbr' => $this->student->mbr,
                'ects_ukupno' => (int)$ects_za_kolegij
            ];
        }
        file_put_contents($this->bodoviFile, json_encode($bodovi, JSON_PRETTY_PRINT),LOCK_EX);
    }

    public function zapisiJSON(): void {
        $this->evidentiraj_ispit();
        $this->evidentiraj_ects_bodove();
    }
}

?>