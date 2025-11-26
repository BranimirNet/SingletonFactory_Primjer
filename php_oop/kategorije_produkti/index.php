<?php session_start();?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Unos zaposlenika</title>
        <style>
            body{
                font-family: Arial, Helvetica, sans-serif;
                background-color: #e0dedeff;
            }

            form{
                width: 100%;
                font-size: 12px;
            }

            input[type="text"],input[type="email"],input[type="number"]{
                padding: 5px;
            }

            input[type="submit"]{
                display: block;
                border-radius: 3px;
                padding: 10px;
            }

            label{
                padding-top: 10px;
                display: block;
            }
        </style>
    </head>
    <body>
            <h2>Unos proizvoda</h2>
            <form action="process.php" method="POST">
                <label>Naziv proizvoda:</label>
                <input type="text" name="productName">
                <label>Cijena proizvoda:</label>
                <input type="number" name="productPrice" step="0.01">
                <label>Kategorija:</label>
                <input type="text" name="categoryName">
                <label>Opis:</label>
                <input type="text" name="categoryDesc">                     
                <label><input type="submit" value="Spremi"></label>
            </form>
            <hr>
            <h2>Proizvodi u sesiji:</h2>
            <?php
            if(!empty($_SESSION["products"])){
                echo "<table border='1' cellpadding='6' cellspacing='0'>";
                echo "<thead style='background-color:#3399ff;'>";
                echo "<tr>";
                echo "<th>Proizvod</th><th>Cijena</th><th>Kategorija</th><th>Opis</th><th>Kreirano</th>";
                echo "</tr>";
                echo "</thead>";
                echo "<tbody style='background-color:white;'>";
                foreach($_SESSION["products"] as $p){
                    echo "<tr>";
                    echo "<td>{$p['product']}</td>";
                    echo "<td>{$p['price']}</td>";
                    echo "<td>{$p['category']}</td>";
                    echo "<td>{$p['description']}</td>";
                    echo "<td>{$p['createdAt']}</td>";
                    echo "</tr>";
                }
                echo "</tbody>";
                echo "</table>";
            }
            else
            {
                echo "Nema još proizvoda";
            }
            ?>
    </body>
</html>