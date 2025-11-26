<?php

/*
potrebno je napraviti pozivanje konfiguracijskih postavki preko singleton kase Config.
konstruktor treba kod incijalizacije napuniti array (npr. postavke) sa sljedećim vrijednostima:
"site_name" => "Moj web",
"version" => "1.0.0"
"copyright" => "Dizajn d.o.o."

potrebno je pozvati instancu klase Config u kojoj će se postaviti parametri, te je potrebno iz te intance
ispisati site_name koji će se primiti kao parametar.
nakon toga potrebno je pozvati još dvije instance koje će ispisati verziju i copyright
*/

class Config{
     private static ?Config $instance = null;

     private array $postavke;

     private function __construct(){
        $this->postavke=[
        "site_name" => "Moj web",
        "version" => "1.0.0",
        "copyright" => "Dizajn d.o.o."
        ];
     }

     public static function getInstance(): Config{
        return self::$instance ??= new Config();
     }

     public function get($key) {
            return $this->postavke[$key] ?? null;
     }
}

$c1 = Config::getInstance();
echo $c1->get("site_name");

$c2 = Config::getInstance();
echo $c2->get("version");

$c3 = Config::getInstance();
echo $c3->get("copyright");
?>