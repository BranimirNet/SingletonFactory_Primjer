<!DOCTYPE html>
<html>
    <head>
        <title>Popis zaposlenika</title>
        <link rel="stylesheet" href="stil.css">
    </head>
    <body>
    <?php
    include "infopodaci.php";

    $datoteka="zaposlenici.json";
    if(!file_exists($datoteka)){
        file_put_contents($datoteka,json_encode([]));
    }

    $postojeciSadrzaj=file_get_contents($datoteka);
    $rezultatiSvi = json_decode($postojeciSadrzaj,true);
    $podaci=[];
    $defpojam="";
    if(isset($_POST["pojam"])){
        $pojam=strtolower($_POST["pojam"]);
        $defpojam=$_POST["pojam"];
        foreach($rezultatiSvi as $osoba){
            if((strpos(strtolower($osoba["ime"]),$pojam) !== false) || strpos(strtolower($osoba["prezime"]),$pojam) !== false){
                $podaci[]=$osoba;
            }
        }
    }
    else
    {
        $podaci=$rezultatiSvi;
    }

   
    ?>

    <form action = "<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST" id="formpretraga">
        <label>Upišite pojam:</label>
        <label><input type="text" name="pojam" id="pojam" value="<?php echo $defpojam; ?>"></label>
        <label><input type="submit" value="Pretrazi"></label>
    </form>

    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Ime</th>
                <th>Prezime</th>
                <th>Datum rođenja</th>
                <th>Sprema</th>
                <th>Zanimanja</th>
                <th>Email</th>
                <th>Plaća</th>
                <th>Slika</th>
                <th>Aktivan</th>
                <th>Akcija</th>
            </tr>
        </thead>
        <tbody>
           <?php foreach($podaci as $zaposlenik){
            $zaposlenikZanimanja="";
            foreach($zaposlenik["odbzanimanja"] as $sif){
                $zaposlenikZanimanja.=$zanimanja[$sif].",";
            }
            $zaposlenikAktivan = $zaposlenik["aktivan"]==true ? "Da" : "Ne";
            $sifSprema = $zaposlenik["sprema"];
            $zaposlenikSprema = $spreme[$sifSprema];
            ?>
            <tr>
                <td><?php echo $zaposlenik["id"]; ?></td>
                <td><?php echo $zaposlenik["ime"]; ?></td>
                <td><?php echo $zaposlenik["prezime"]; ?></td>
                <td><?php echo $zaposlenik["datumrodjenja"]; ?></td>
                <td><?php echo $zaposlenikSprema; ?></td>
                <td><?php echo $zaposlenikZanimanja; ?></td>
                <td><?php echo $zaposlenik["email"]; ?></td>
                <td><?php echo $zaposlenik["placa"]; ?></td>
                <td><img src='<?php echo $zaposlenik["slika"]; ?>' width="100px" height="100px"></td>
                <td><?php echo $zaposlenikAktivan; ?></td>
            </tr>
           <?php 
        }
        ?>
        </tbody>
    </table>
    <label><a href="zaposlenik.php">Unesi novog</a></label>
    </body>
</html>