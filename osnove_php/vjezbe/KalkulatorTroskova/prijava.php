<?php
include "header.php"; 
?>
<link rel="stylesheet" href="stil.css">

<style>
 
body {
    background: url('login.webp') no-repeat center center fixed;
    background-size: cover;
    margin: 0;
    padding: 0;
    height: 100vh;
}
</style>
<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $user=$_POST["username"];
    $pass=$_POST["lozinka"];
    $korisnici = UcitajKorisnike();

    foreach($korisnici as $k){
        if($k["userName"]===$user && $k["password"]===$pass){
            $_SESSION["user"]=$k;
            header("Location: index.php");
            exit();
        }
    }
    $_SESSION["error"]="Krivi podaci";
}

?>
    <div id="sadrzaj">
        
    <h2>Prijava</h2>
    <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <label style="font-weight: bold; font-size: 30px; color: red; text-align:center;">Korisničko ime:</label>
        <label><input type="text" name="username"></label>
        <label style="font-weight: bold; font-size: 30px; color: red; text-align:center;">Šifra:</label>
        <label><input type="password" name="lozinka"></label>
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