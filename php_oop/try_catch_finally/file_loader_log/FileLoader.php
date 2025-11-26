<?php

class FileLoader{

    public function load($filename){
        if(!file_exists($filename)){
            throw new Exception("Datoteka ne postoji: " . $filename);
        }
    
    return file_get_contents($filename);
    }
}




?>