<?php

/*
napraviti sučelje Formatter sa predefiniranom metodom fomrat koja prima neki string.

zatim napraviti dvije klase UpperFormatter i LowerFormatter koji će vratiti preko metoda upper odnosno lower string.
napraviti FormatterFactory koji će vratiti određeni tip klase ovisno o prosljeđenom parametru. Return type mora biti interface

probati na dva primjera pozvati factory i ispisati rezultat metode format.
*/

interface Formatter{
    public function format(string $txt): string;
}

class UpperFormatter implements Formatter{
    public function format(string $txt):string{
        return strtoupper($txt);
    }
}

class LowerFormatter implements Formatter{
    public function format(string $txt):string{
        return strtolower($txt);
    }
}

class FormatterFactory{

    public static function create (string $type): Formatter{
        return $type === "upper" ? new UpperFormatter() : new LowerFormatter();
    }
}

$f1 = FormatterFactory::create("upper");
$f2 = FormatterFactory::create("lower");

echo $f1->format("SkOLA Je sUPeR");
echo $f2->format("SkOLA Je sUPeR");
?>