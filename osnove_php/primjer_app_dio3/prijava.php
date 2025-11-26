<?php
include "zaglavlje.php"; 

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $user=$_POST["username"];
    $pass=$_POST["lozinka"];
    $korisnici = UcitajPodatke("userData.json");

    foreach($korisnici as $k){
        if($k["userName"]===$user && $k["password"]===$pass){
            $_SESSION["user"]=$k;
            if(isset($_POST["zapamti"]) && $_POST["zapamti"]==1){
                setcookie("LOGINPRIJAVA",$user,time()+300);
            }
            header("Location: index.php");
            exit();
        }
    }
    $_SESSION["error"]="Krivi podaci";
}

?>
    <div id="sadrzaj">
        
    <h2>Prijava</h2>
    <?php
    $defUser="";
    if(isset($_COOKIE["LOGINPRIJAVA"])){
        $defUser=$_COOKIE["LOGINPRIJAVA"];
    }
    ?>
    <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <label>Korisničko ime:</label>
        <label><input type="text" name="username" value="<?php echo $defUser; ?>"></label>
        <label>Šifra:</label>
        <label><input type="password" name="lozinka"></label>
        <label><input type="checkbox" name="zapamti" value="1"> Zapamti me</label>
        <label><input type="submit" value="Prijava"></label>
    </form>
    <p class="error">
        <?php
        if(isset($_SESSION["error"])){
            echo $_SESSION["error"];
            unset($_SESSION["error"]);
        }
        ?>
    </p>
    </div>
<?php include "podnozje.php"; ?>