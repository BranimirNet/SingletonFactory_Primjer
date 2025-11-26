<?php
session_start();
include "helpers.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Kalkulator Resursa</title>
        <link rel="stylesheet" href="stil.css">
    </head>
    <body>
    <div id="zaglavlje">
        <a href="index.php">Početna</a>
        <?php
        if(!isset($_SESSION["user"])){
            echo "<a href=\"prijavakalkres.php\">Prijava</a>";
        }
        if(isset($_SESSION["user"])){
            ?>
        <a href="odjava.php">Odjava</a>
            <?php
        }
        ?>

        <span class="user">
            <?php
            if(isset($_SESSION["user"])){
                echo "Dobrodošao ".$_SESSION["user"]["userName"]."!";
            }
            else
            {
                echo "Niste prijavljeni";
            }
            ?>
        </span>
    </div>