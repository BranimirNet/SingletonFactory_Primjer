<?php

/* potrebno je na proceduralni i OOP nacin prikazani izracun povrsine trokuta
kome su poznate stranice a i b

potrebno je prvo preko metoda izracunati povrsinu i prikazati rezultat */

echo "<h1>Proceduralni način</h1>";

function izracunajPovrsinu($a, $b): float|int {
    return $a * $b;
}

function prikaziRezultat($rezultat): void {
    echo "<br>Površina je: " . $rezultat;
}

$povrsina = izracunajPovrsinu(5, 10);
prikaziRezultat($povrsina);

echo "<h1>OOP</h1>";

class Trokut{

    public $a;

    public $b;

    public $c;

    public function postaviStranice($a,$b): void{

        $this->a=$a;
        $this->b=$b;
    }

    public function povrsina(): float|int{
        return $this->a * $this->b;
    }

    public function prikaz(): void{
        echo "<br>Povrsina je: ".$this->povrsina();
        echo "<br>Treca stranica je: ".$this->c;
        if($this->c == (int)$this->c){
            echo "<br>Trokut je pravokutan";
        }
        else{
            echo"<br>Trokut nije pravokutan";
        }
    }

    public function pitagora(): void{
        $this->c = sqrt(pow($this->a,2)+pow($this->b,2));

    }
}

$tr1 = new Trokut();
$tr1->postaviStranice(5,10);
$tr1->pitagora();
$tr1->prikaz();

$tr2 = new Trokut();
$tr2->postaviStranice(12,9);
$tr2->prikaz();
?>