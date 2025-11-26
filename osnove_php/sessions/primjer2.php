<!DOCTYPE html>
<html>
    <head>
        <title>Session primjer 2</title>
    </head>
    <body>
        <?php 
        /*
        potrebno je napraiti html formu koja će slati korisničko ime studenta i ocjenu, te podatke spremati u sesiju

sve podatke potrebno je ispisivati i slati unutar iste skripte u HTML tablicu.

na kraju ispisati prosjek ocjena preko funkcije koja će vratiti prosjek
        */
        if(session_status()===PHP_SESSION_NONE){
    session_start();
        } 
        ?>

        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
    <p>Korisničko ime: <input type="text" name="korime"></p>
    <p>Ocjena:<br>
        <select name="ocjena">
            <?php
            for ($ocj = 1; $ocj <= 5; $ocj++) {
                echo "<option value='{$ocj}'>$ocj</option>";
            }
            ?>
        </select>
    </p>
    <p><input type="submit" value="Izračun"></p>
</form>

<h2>Ispis spremljenih podataka</h2>
<table border="1">
    <thead>
        <tr>
            <th>Student</th>
            <th>Ocjena</th>
        </tr>
        </thead>
        <tbody>
            <?php 
            if(count($_SESSION)>0){

                foreach($_SESSION as $stud=>$ocjena){

                    echo "<tr>";
echo "<td>{$stud}</td>";
echo "<td>{$ocjena}</td>";
echo "</tr>";
}

echo "<tr>";
echo "<td colspan='2'>Prosjek: ".VratiProsjek()."</td>";
echo "</tr>";


                }




            
            
            
            
            
            
            ?>



        



        
        
        
        
    

    </body>
</html>