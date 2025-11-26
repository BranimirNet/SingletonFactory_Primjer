<?php

/*
napraviti sučelje Shape sa metodom area koja će biti return type float,
zatim napraviti divje klase Circle i Square koje će vraćati površine (area metoda) na temelju prosljeđenih parametara.
potrebno kreirati 2 primjera za test rada klase
*/

interface Shape{
    public function area(): float;

    public function diag(): float;
}

class Circle implements Shape{

    public function __construct(private float $r){

    }

    public function area(): float{
        return pow($this->r,2)*3.14;
    }

    public function diag(): float{
        return $this->r;
    }
}

class Square implements Shape{
    public function __construct(private float $a){}

    public function area(): float{
        return pow($this->a,2);
    }

    public function diag(): float{
        return $this->a*sqrt(2);
    }
}

class ShapeFactory{

    public static function create($shape,$param):Shape{
        return match($shape){
            "Circle" => new Circle($param),
            "Square" => new Square($param),
            default => throw new Exception("Nepoznati oblik")
        };
    }
}

$s1=ShapeFactory::create("Circle",3);
$s2=ShapeFactory::create("Square",5);

echo "<br>Površina kruga: ".$s1->area();
echo "<br>Površina kvadrata: ".$s2->area();
echo "<br>Dijagonala kvadrata: ".$s2->diag();
?>