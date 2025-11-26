<?php

class DBConnect{

    private static ?DBConnect $instance = null;
    private mysqli $connection;

    private function __construct(){
        $this->connection = new mysqli("localhost","phpuser","12345","classicmodels");
    }

    public static function getInstance(): DBConnect{
        if(self::$instance === null){
            self::$instance = new DBConnect();
        }
        return self::$instance;
    }

    public function getConnection(){
        return $this->connection;
    }
}

//$db = new DBConnect();

try{
$db1=DBConnect::getInstance()->getConnection();
}
catch(Exception $ex){
    echo "Greška kod spajanja: ".$ex->getMessage();
}

try{
$db2=DBConnect::getInstance()->getConnection();
}
catch(Exception $ex){
    echo "Greška kod spajanja: ".$ex->getMessage();
}

var_dump($db1===$db2);

?>