<?php
if(session_status()==PHP_SESSION_NONE){
    session_start();
}
$currentScript = basename($_SERVER["PHP_SELF"]);
require "db/config.php";
include "helpers/sifarnici.php";
include "helpers/metode.php";
?>
<!DOCTYPE html>
<html lang="hr">
    <head>
        <meta charset="UTF-8">
        <title>::Portal za narudžbe::</title>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <header>
            <h1>Classic models početna stranica</h1>
        </header>
  
        <nav>
            <a href="index.php" <?php if($currentScript=="index.php") echo "class='active_menu'"; ?>>Početna</a>
            <a href="zaposlenici.php" <?php if($currentScript=="zaposlenici.php") echo "class='active_menu'"; ?>>Popis zaposlenika</a>
            <a href="#">Kupci</a>
            <a href="narudzba.php" <?php if($currentScript=="narudzba.php") echo "class='active_menu'"; ?>>Narudžba</a>
        </nav>