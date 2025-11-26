<?php

/*
potrebno je pomoću klase Cache emitirati spremanje neke vrijednosti u array te 
pokazati preko singleton klase kako druga instanca koristi istu spremljenu vrijednost
*/

class Cache{

    private static ?Cache $instance = null;
    private array $data = [];

    private function __construct(){
        echo "Cache je inicijaliziran";
    }

    public static function getInstance(): Cache{
        return self::$instance ??= new Cache();
    }

    public function set($key,$val){
        $this->data[$key]=$val;
        echo "<br>Cache postavljen: $key = $val";
    }

    public function get($key){
        return $this->data[$key] ?? "Nema ništa u cache-u";
    }
   
}

$cache1 = Cache::getInstance();
$cache1->set("broj",123);

$cache2 = Cache::getInstance();
echo "<br>Cache2: ".$cache2->get("broj");

?>