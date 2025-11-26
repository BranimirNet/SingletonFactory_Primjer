<?php

/*potrebno je napraviti dvije klase unutra programa: studenti i ocjene
za studenta postaviti: ime, prezime, sifra, godina
za ocijene: sifrastudenta, te ocjene kao array u koje ce se kao kljucevi spremati predmeti,
a vrijednosti ce biti ocijene
potrebno je dodavanje svojstava rijesiti pomocu metoda te na kraju izracunati 
prosjek ocjena za tog studenta i broj predmeta koje je odslusao */

class Studenti{
    public $ime;
    public $prezime;
    public $sifra;
    public $godina;

    public function postaviPodatke($ime,$prezime,$sifra,$godina): void{
        $this->ime=$ime;
        $this->prezime=$prezime;
        $this->sifra=$sifra;
        $this->godina=$godina;
    }

    public function prikaziPodatke(): void{
        echo "<h3>Podaci o studentu:</h3>";
        echo "<br>Ime: ".$this->ime;
        echo "<br>Prezime: ".$this->prezime;
        echo "<br>Šifra: ".$this->sifra;
        echo "<br>Godina: ".$this->godina;
    }
}

class Ocjene{
    public $sifrastudenta;
    public $ocjene = array();

    public function dodajOcjenu($predmet,$ocjena): void{
    $this->ocjene[$predmet]=$ocjena;
}

public function prikaziOcjene(): void{
    echo "<h3>Ocjene studenta:</h3>";
    foreach($this->ocjene as $pred=>$ocj){
        echo "<br>Predmet: ".$pred.", ocjena: ".$ocj;
    }
}

public function izracunajProsjek(): float{
    if(count($this->ocjene) == 0){
        return 0;
    }

    if(in_array(1,$this->ocjene)){
        return 1;
    }

    $zbroj=array_sum($this->ocjene);
    $prosjek=$zbroj/count($this->ocjene);
    return round($prosjek,2);
}

public function prikaziProsjek(): void{
    $prosjek=$this->izracunajProsjek();
    echo "<br>Prosjek ocjena: ".$prosjek;
    echo "<br>Broj predmeta: ".count($this->ocjene);

}

public function prikaziUspjeh(): string{
    if($this->izracunajProsjek()>=1.5 && $this->izracunajProsjek()<2.5)
        return "Dovoljan";
    elseif($this->izracunajProsjek()>=2.5 && $this->izracunajProsjek()<3.5)
        return "Dobar";
    elseif($this->izracunajProsjek()>=3.5 && $this->izracunajProsjek()<4.5)
        return "Vrlo Dobar";
    elseif($this->izracunajProsjek()>=4.5)
        return "Izvrstan";
    else
        return "Nedovoljan";
}


}

$stud1 = new Studenti();
$stud1->postaviPodatke("Miro","Mirić","ST111",2);
$stud2 = new Studenti();
$stud2->postaviPodatke("Ana","Anić","ST222",3);

$ocj1=new Ocjene();
$ocj1->sifraStudenta="ST111";
$ocj1->dodajOcjenu("Matematika",5);
$ocj1->dodajOcjenu("Programiranje",4);
$ocj1->dodajOcjenu("Baze podataka",3);
$ocj1->dodajOcjenu("Engleski",3);
$ocj1->dodajOcjenu("Algoritmi",1);

$stud1->prikaziPodatke();
$ocj1->prikaziOcjene();
$ocj1->prikaziProsjek();
echo "<br>Uspjeh: ".$ocj1->prikaziUspjeh();

$ocj2=new Ocjene();
$ocj2->sifraStudenta="ST222";
$ocj2->dodajOcjenu("Matematika",4);
$ocj2->dodajOcjenu("Programiranje",4);
$ocj2->dodajOcjenu("Baze podataka",2);
$ocj2->dodajOcjenu("Engleski",2);


$stud2->prikaziPodatke();
$ocj2->prikaziOcjene();
$ocj2->prikaziProsjek();
echo "<br>Uspjeh: ".$ocj2->prikaziUspjeh();



?>