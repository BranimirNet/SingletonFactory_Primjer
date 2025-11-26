<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        
        <title>Osnove HTML - liste</title>
        
       <?php 

       require_once "izracuni.php";

       $predmeti=["Matematika", "Programiranje", "Baze podataka", "Algoritmi", "Web dizajn"];
        $BrojUcenika=(10);
       ?>

        <title>Prosjek ocjena</title>
        </head>
    <body>

        <table border="1" cellpadding="5">
<tr>
    <th>Učenik</th>
    <?php foreach($predmeti as $predmet) echo "<th>$predmet</th>"; ?>
    <th>Prosjek</th>
    <th>Uspjeh</th>
</tr>
<?php 


$ocjene=[];
$BrojPredmeta=count($predmeti);

for($i=1; $i<=$BrojUcenika; $i++) {
    echo "<tr>";
    echo "<td>Učenik $i</td>";

    $ocjene = [];
    foreach ($predmeti as $predmet) {
        $ocjena = rand(1, 5);
        $ocjene[] = $ocjena;
        echo "<td>$ocjena</td>";
    }

    $prosjek = RacunanjeProsjeka(...$ocjene);
    $uspjeh = Uspjeh($prosjek);
    echo "<td>$prosjek</td>";
    echo "<td>$uspjeh</td>";

    echo "</tr>";
}
    ?>
</table>

        

    </body>
    
</html>