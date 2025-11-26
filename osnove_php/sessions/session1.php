<!DOCTYPE html>
<html>
    <head>
        <title>Sessions</title>
    </head>
    <body>
        <?php 

        echo "<h2>SESSIONS</h2>";

$currentFile = basename($_SERVER["PHP_SELF"]);
echo "<br>Current file: ".$currentFile;
echo "<p>Session id: ".session_id()."</p>";
session_start();

echo "<p>Session id: ".session_id()."</p>";

echo "<h3>Definicija varijabli</h3>";

if(isset($SESSION["ime"])){
echo "Session ime var: ".$SESSION["ime"]."</p>";
}

$_SESSION["ime"]="Tamara";
echo "<p>Session ime var: ".$_SESSION["ime"]."</p>";

echo "<p>Vrijeme izvršavanja skripte: ".$_SESSION["vrijeme"]."</p>";

$_SESSION["sifra"]=1000;

echo "<p>Session sifra var: ".$_SESSION["sifra"]."</p>";

echo "<h2>Link na druge skripte</h2>";

echo "<h2>Link na druge skripte</h2>";
echo "<p><a href='session2.php'>Druga</a></p>";
echo "<p><a href='session3.php'>Treća</a></p>";

echo "<h2>Uništavanje sesije</h2>";
echo "<p><a href='{$currentFile}?unisti=1'>Uništi sesiju</a></p>";

if (isset($_GET["unisti"])) {
    session_destroy();
    echo "<p>Sesija uništena</p>";
}
echo "<p>Pokrenute sessije</p>";

foreach($_SESSION as $key=>$val){
echo "<p>Ključ: ".$key." => Vrijednost: ".$val."</p>";
}










        
        
        
        
        
        
        
        ?>

    </body>
</html>