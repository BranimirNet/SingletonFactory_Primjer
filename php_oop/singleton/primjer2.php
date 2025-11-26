<?php

class DB{

    private static ?DB $instance = null;

    public $connectionid;

    private function __construct(){
        $this->connectionid = rand(1000,9999);
        echo "<br>Kreirana konekcija sa ID: ".$this->connectionid;
    }

    public static function getInstance() : DB {
        return self::$instance ??= new DB();
    }
}

$db1=DB::getInstance();
$db2=DB::getInstance();

echo "<br>DB1 ID: ".$db1->connectionid;
echo "<br>DB2 ID: ".$db2->connectionid;

if($db1===$db2){
    echo "<br>Radi se o istoj SINGLETON instanci";
}
else
{
    echo "<br>Postoje različite instance";
}

?>