<?php

spl_autoload_register(function ($className) {
    if(strpos($className,'OrdersProject\\') !== 0){
        return;
    }

    $relativeClass = str_replace('OrdersProject\\', '', $className);
    $putanja = __DIR__ . '/' . str_replace('\\', '/', $relativeClass) . '.php';

    if(file_exists($putanja)){
        require_once $putanja;
    } else {
        echo "<br>Upozorenje! Datoteka za klasu {$className} nije pronađena na putanji {$putanja}.";
    }
});

?>
