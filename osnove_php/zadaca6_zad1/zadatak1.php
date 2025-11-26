<!DOCTYPE html>
<html>
    <head>
        <title>Zadaća 6</title>
        <style>
            form{
                width: 50%;
                font-family: Arial, Helvetica, sans-serif;
            }
            input[type="text"],input[type="password"]{
                padding: 5px;
            }

            input[type="submit"]{
                padding: 5px;
                margin-top: 10px;
            }

            label{
                display: block;
                margin-bottom: 5px;
            }

            #error{
                color: red;
            }
        </style>
    </head>
    <body>

    <?php

    if(session_id()===""){
        session_start();
    }

    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $korime=$_POST["korime"];
        $lozinka=$_POST["lozinka"];
        $zapamti=isset($_POST["zapamti"]);


        $dat="userData.json";
        if(!file_exists($dat)){
            die("Nedostaje datoteka");
        }

        $podaci=json_decode(file_get_contents($dat),true);

        $prijavljen=false;

        foreach($podaci as $korisnik){
            if($korisnik["userName"]==$korime && $korisnik["password"]==$lozinka){
                $prijavljen=true;

                $_SESSION["korisnik"]=$korime;

                if($zapamti){
                    setcookie("PRIJAVA",$korime,time()+300);
                }

                if($korisnik["gender"]=="male"){
                    $prefix="Dobrodošao";
                }
                else
                {
                    $prefix="Dobrodošla";
                }

                $poruka=$prefix." ".$korime."!";
                echo '<p><a href="'.$_SERVER['PHP_SELF'].'?odjava=1">Odjava</a></p>';
                break;
            }
        }

        if(!$prijavljen){
            $_SESSION["poruka"]="Pogrešno upisani podaci";
            header("Location: zadatak1.php");
            exit();
        }

        echo $poruka;
}

if(isset($_GET["odjava"])){
    unset($_SESSION["korisnik"]);
    header("Location: zadatak1.php");
}

if(!isset($_SESSION["korisnik"])){

    $user="";
    if(isset($_COOKIE["PRIJAVA"])){
        $user=$_COOKIE["PRIJAVA"];
    }
    ?>

    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST">
        <label>Korisničko ime:</label>
        <label><input type="text" name="korime" value="<?php echo $user; ?>"></label>
        <label>Lozinka:</label>
        <label><input type="password" name="lozinka"></label>
        <label><input type="checkbox" name="zapamti"> Zapamti me</label>
        <label><input type="submit" value="Prijava"></label>
    </form>
    <p id="error">
        <?php
        if(isset($_SESSION["poruka"])){
            echo $_SESSION["poruka"];
            unset($_SESSION["poruka"]);
        }
        ?>
    </p>
    <?php
}
    ?>
    </body>
</html>