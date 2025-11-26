<?php

class SessionManager{
    private static ?SessionManager $instance = null;

    private function __construct(){
        session_start();
        echo "<br>SEsija pokrenuta";
    }

    public static function getInstance(): SessionManager{
        return self::$instance ??= new SessionManager();
    }

    public function setSession($key,$value){
        $_SESSION[$key]=$value;
        echo "<br>Postavljen SESSION[$key]=$value<br>";
    }

    public function getSession($key){
        return $_SESSION[$key] ?? null;
    }

    //napraviti još dvije public metode za postavljanje i dohvat cookie-a koji će se zvati LOGIN i pamtit će podatak "korisnik" i trajat će 20 sekundi

    public function setCookie($key,$value){
        setcookie($key,$value,time()+20);
    }

    public function  getCookie($key) {
        return $_COOKIE[$key] ?? "Cookie nije postavljen";
    }
}

$s1 = SessionManager::getInstance();
$s1->setSession("ime","Marko");

$s2 = SessionManager::getInstance();
echo "<br>Ime iz s2: ".$s2->getSession("ime");

$s3 = SessionManager::getInstance();
$s3->setCookie("LOGIN","korisnik");
echo "<br>Cookie: ".$s3->getCookie("LOGIN");
?>