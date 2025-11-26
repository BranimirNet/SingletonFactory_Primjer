<?php

require_once "Item.php";

class Category extends Item{

    private string $description;

    public function __construct($name, $description){
        $this->name=$name;
        $this->description = $description;
    }

    public function getInfo(): string {
        return "<br>Kategorija {$this->name} - {$this->description}";
    }

    public function getType():string {
        return "Category";
    }

    public function getDescription(){
        return $this->description;
    }
}

// $kat1=new Category("Voće","Ovo je voće");
// echo "<br>Get info: ".$kat1->getInfo();
// echo "<br>Tip: ".$kat1->getType();
// echo "<br>Opis: ".$kat1->getDescription();

?>