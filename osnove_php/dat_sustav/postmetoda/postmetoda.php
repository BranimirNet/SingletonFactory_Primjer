<!DOCTYPE html>
<html>
    <head>
        <title>POST metoda</title>
        <link rel="stylesheet" href="stil.css">
    </head>
    <body>
    <?php
    include "sifarnici.php";
    ?>
    <form method="POST" action="postposalji.php">
        <label>Ime:</label>
        <label><input type="text" name="ime" id="ime" value="Pero"></label>
        <label>Godine:</label>
        <label><input type="text" name="godine" id="godine" value="35"></label>
        <label>Grad:</label>
        <label>
            <select name="grad" id="grad">
                <option value="-1">Odaberi</option>
                <?php
                asort($gradovi);
                foreach($gradovi as $ozn=>$grad){
                    echo "<option value='$ozn'>$grad</option>";
                }
                ?>
            </select>
        </label>
        <label>
            Spol:
        </label>
        <label>
            <input type="radio" name="spol" value="m"> Muški
            <input type="radio" name="spol" value="z"> Ženski
        </label>
        <label>Sportovi:</label>
        <label>
            <?php
            foreach($sportovi as $oznsport=>$nazivsport){
                echo "<label><input type='checkbox' name='sport[]' value='{$oznsport}'> {$nazivsport} </label>";
            }
            ?>
        </label>
        <label>Kratak opis:</label>
        <label><textarea name="opis" id="opis" rows="15" cols="20"></textarea></label>
        <label><input type="submit" value="Pošalji"></label>
    </form>

    </body>
</html>