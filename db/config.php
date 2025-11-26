<?php 

define("DB_SERVER","localhost");
define("DB_USERNAME","classicweb");
define("DB_PASSWORD","web123");
define("DB_NAME","classicmodels");

$conn = null;

function connectDB() {
   global $conn;
    $conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
    if (!$conn) {
        die("Neuspjela konekcija: " . mysqli_connect_error());
    }
    mysqli_set_charset($conn, "utf8");
    return $conn;
}

/* if (connectDB()) {
    echo "<br>Uspjesno spojen";
} else {
    echo "<br>Nisam spojen";
} */

    function closeDB(): void{
         global $conn;
         if($conn){
            mysqli_close($conn);
         }
        }
?>