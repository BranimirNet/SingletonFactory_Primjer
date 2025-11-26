<!DOCTYPE html>
<html>
    <head>
        <title>POST obrada</title>
        <link rel="stylesheet" href="stil.css">
    </head>
    <body>

    <?php
    include "sifarnici.php";
    $metoda = $_SERVER["REQUEST_METHOD"];
    echo "<br>Metoda: ".$metoda;

    print_r($_POST);

    $greske=0;
    $ime=$_POST["ime"];

    if(!empty($ime)){
        echo "<label>Ime je: ".$ime."</label>";
    }
    else
    {
        echo "<label class='greska'>Niste upisali ime</label>";
        $greske++;
    }

    $godine=$_POST["godine"];

    if(!empty($godine)){

        if(is_numeric($godine)){
            echo "<label>Godine su: ".$godine."</label>";
        }
        else
        {
            echo "<label class='greska'>Godine nisu numeric</label>";
            $greske++;
        }
    }
    else
    {
        echo "<label class='greska'>Niste upisali godine</label>";
        $greske++;
    }


    if(isset($_POST["grad"])){
        $grad=$_POST["grad"];
        if($grad!="-1"){
            echo "<label>Grad: ".$gradovi[$grad]."</label>";
        }            
        else{
            echo "<label class='greska'>Pogrešan odabir</label>";
            $greske++;
        }

    }
    else
    {
        echo "<label class='greska'>Niste odabrali grad</label>";
        $greske++;
    }

    if(isset($_POST["spol"])){
        $spol=$_POST["spol"];
        echo "<label>Spol: ";
        $spolinfo=$spol=="m" ? "Muški" : "Ženski";
        echo $spolinfo;
        echo "</label>";
    }
    else
    {
        echo "<label class='greska'>Niste odabrali spol</label>";
        $greske++;
    }

    if(isset($_POST["sport"])){
        $odbsportovi=$_POST["sport"];
        //print_r($odbsportovi);
        echo "<label>Sportovi: ";
        $sportovijoin="";
        foreach($odbsportovi as $poslano){
            echo $sportovi[$poslano].", ";
            $sportovijoin.=$sportovi[$poslano].", ";
        }
        echo "</label>";
    }
    else{

        echo "<label class='greska'>Niste odabrali sprot</label>";
        $greske++;
    }

    if(!empty($_POST["opis"])){

        $opis=$_POST["opis"];
        if(strlen($opis)>250){
            echo "<label class='greska'>Predugačak opis</label>";
            $greske++;
        }
        else
        {
            echo "<label>Opis: ".$opis."</label>";           
        }
    }
    else
    {
        echo "<label class='greska'>Niste upisali opis</label>";
        $greske++;
    }

    echo "<label>Broj grešaka: {$greske}</label>";
    //sve ove podatke ukoliko su poslani pospremiti u datoteku postpodaci.json

    if($greske==0){

        $datoteka="postpodaci.json";

        if(!file_exists($datoteka)){
            file_put_contents($datoteka,json_encode([]));
        }

        $podaci=json_decode(file_get_contents($datoteka),true);

        $id= !empty($podaci) ? max(array_column($podaci,'id'))+1 : 1;

        $podaci[]=[
            "id"=>$id,
            "ime"=>$ime,
            "godine"=>$godine,
            "grad"=>$gradovi[$grad],
            "spol"=>$spolinfo,
            "sportovi"=>$sportovijoin,
            "opis"=>$opis
        ];

        file_put_contents($datoteka,json_encode($podaci,JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    }
    ?>

    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Ime</th>
                <th>Godine</th>
                <th>Grad</th>
                <th>Spol</th>
                <th>Sportovi</th>
                <th>Opis</th>
            </tr>
        </thead>
        <tbody>
           <?php foreach($podaci as $osoba){?>
            <tr>
                <td><?php echo $osoba["id"]; ?></td>
                <td><?php echo $osoba["ime"]; ?></td>
                <td><?php echo $osoba["godine"]; ?></td>
                <td><?php echo $osoba["grad"]; ?></td>
                <td><?php echo $osoba["spol"]; ?></td>
                <td><?php echo $osoba["sportovi"]; ?></td>
                <td><?php echo $osoba["opis"]; ?></td>
            </tr>
           <?php }?>
        </tbody>
    </table>

    <p><a href="postmetoda.php">Ponovno</a></p>
    </body>
</html>