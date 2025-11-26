<?php

class Logger{

    private static ?Logger $instance = null;
    private string $fileName;

    private function __construct(){
        $this->fileName = "log.txt";
    }

    public static function getInstance() : Logger {
        return self::$instance ??= new Logger();
    }

    public function write($message){
        file_put_contents($this->fileName,$message.PHP_EOL, FILE_APPEND);
    }

    public function poruka(){
        return "<br>Uspješan poziv!";
    }
}

Logger::getInstance()->write("Aplikacija je pokrenuta");
Logger::getInstance()->write("Korisnik je prijavljen");
echo Logger::getInstance()->poruka();

?>