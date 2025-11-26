<!DOCTYPE html>
<html>
    <head>
        <title>POST metoda</title>
        <link rel="stylesheet" href="stil.css">
    </head>
    <body>
    <?php
    include "infopodaci.php";

    if($_SERVER["REQUEST_METHOD"]=="POST"){

        $idzap=$_POST["idzap"];
        $ime=$_POST["ime"];
        $prezime=$_POST["prezime"];
        $datumrodjenja=$_POST["datumrod"];
        $sprema=$_POST["sprema"];
        $odbzanimanja=$_POST["zanimanje"];
        $email=$_POST["email"];
        $placa=$_POST["placa"];
        $aktivan=$_POST["aktivan"];
        $postojecaSlika=$_POST["postojeca"];
        $datumazur=date("Y-m-d H:i:s");

        $akt = $aktivan == 1 ? true : false;

        $odredisniFolder="slike/";
        $slikaNaziv=basename($_FILES["datoteka"]["name"]);
        if($slikaNaziv!="" && $slikaNaziv!=null){
            $odredisnaDatoteka = $odredisniFolder.$slikaNaziv;
            $tmpDat=$_FILES["datoteka"]["tmp_name"];
            $stavisliku=move_uploaded_file($tmpDat,$odredisnaDatoteka);
        }
        else
        {
            if($postojecaSlika!=""){
                $odredisnaDatoteka=$postojecaSlika;
            }
            else
            {
                $odredisnaDatoteka="";
            }

        }

        $datoteka="zaposlenici.json";

        if(!file_exists($datoteka)){
            file_put_contents($datoteka,json_encode([]));
        }



        $postojeciSadrzaj = file_get_contents($datoteka);
        $podaci=json_decode($postojeciSadrzaj,true);

        //ubacujemo dio za ažuriranje
        if($idzap==0){//unos novog

            $id=!empty($podaci) ? max(array_column($podaci,'id')) + 1 : 1;

            $podaci[]=[
                "id"=>$id,
                "ime"=>$ime,
                "prezime"=>$prezime,
                "datumrodjenja"=>$datumrodjenja,
                "sprema"=>$sprema,
                "odbzanimanja"=>$odbzanimanja,
                "email"=>$email,
                "slika"=>$odredisnaDatoteka,
                "placa"=>(float)$placa,
                "aktivan"=>$akt,
                "datumazur"=>$datumazur

            ];
        }
        else
        {
            //podvrda ažuriranja postojećeg
            $indeks = array_search($idzap, array_column($podaci,'id'));
            if($indeks !== false && $idzap>0){
                $podaci[$indeks]["ime"]=$ime;
                $podaci[$indeks]["prezime"]=$prezime;
                $podaci[$indeks]["datumrodjenja"]=$datumrodjenja;
                $podaci[$indeks]["sprema"]=$sprema;
                $podaci[$indeks]["odbzanimanja"]=$odbzanimanja;
                $podaci[$indeks]["email"]=$email;
                $podaci[$indeks]["slika"]=$odredisnaDatoteka;
                $podaci[$indeks]["placa"]=$placa;
                $podaci[$indeks]["aktivan"]=$akt;
                $podaci[$indeks]["datumazur"]=$datumazur;
            }
        }

        $podaciOsoba=json_encode($podaci,JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        file_put_contents($datoteka,$podaciOsoba);
        //redirekcija
        header("Location: popiszaposlenika.php");
    }

    if(isset($_GET["idzap"])){//ako se radi o ažuriranju/brisanju
        $datoteka="zaposlenici.json";
        $postojeciSadrzaj=file_get_contents($datoteka);
        $podaci=json_decode($postojeciSadrzaj,true);

        if($_GET["action"]=="update"){
            $idZaAzuriranje=$_GET["idzap"];
            foreach($podaci as &$osoba){
                if($osoba["id"]==$idZaAzuriranje){
                    $ime=$osoba["ime"];
                    $prezime=$osoba["prezime"];
                    $datumrodjenja=$osoba["datumrodjenja"];
                    $spremaPr=$osoba["sprema"];
                    $odbzanimanja=$osoba["odbzanimanja"];
                    $email=$osoba["email"];
                    $slika=$osoba["slika"];
                    $placa=$osoba["placa"];
                    $aktivan=$osoba["aktivan"];
                }
            }
            unset($osoba);
        }
        else
        {
            //dio za brisanje
            $idZaBrisanje=$_GET["idzap"];
            $indeks=array_search($idZaBrisanje,array_column($podaci,'id'));
            unset($podaci[$indeks]);
            $podaci=array_values($podaci);//reindeksiranje niza
            file_put_contents($datoteka,json_encode($podaci,JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
            header("Location: popiszaposlenika.php");
        }
    }
    else //unos novog
    {
        $idZaAzuriranje=0;//ovo će nam biti identifikator da se radi o novom zapisu
        $ime=$prezime=$datumrodjenja=$spremaPr=$email=$placa=$slika="";
        $aktivan=NULL;
        $odbzanimanja=[];
    }

    $currentFileName=basename($_SERVER["SCRIPT_NAME"]);//zaposlenik.php
    ?>
    <form method="POST" action="<?php echo $currentFileName; ?>" enctype="multipart/form-data">
        <input type="hidden" name="idzap" id="idzap" value="<?php echo $idZaAzuriranje; ?>">
        <label>Ime:</label>
        <label><input type="text" name="ime" id="ime" value="<?php echo $ime; ?>"></label>
        <label>Prezime:</label>
        <label><input type="text" name="prezime" id="prezime" value="<?php echo $prezime; ?>"></label>
        <label>Datum rođenja:</label>
        <label><input type="date" name="datumrod" id="datumrod" value="<?php echo $datumrodjenja; ?>"></label>
        <label>Sprema:</label>
        <label>
            <select name="sprema" id="sprema">
                <option value="-1">Odaberi</option>
                <?php
                foreach($spreme as $ozn=>$sprema){
                    echo "<option value='$ozn'";
                    if($ozn==$spremaPr){
                        echo " selected";
                    }
                    echo ">$sprema</option>";
                }
                ?>
            </select>
        </label>
        <label>Zanimanja:</label>
        <label>
            <?php
            foreach($zanimanja as $oznzan=>$zanimanje){
                echo "<label><input type='checkbox' name='zanimanje[]' value='{$oznzan}'";
                if(in_array($oznzan,$odbzanimanja)){
                    echo " checked";
                }
                echo "> {$zanimanje} </label>";
            }
            ?>
        </label>
        <label>Email:</label>
        <label><input type="email" name="email" id="email" value="<?php echo $email; ?>"></label>
        <label>Plaća:</label>
        <label><input type="number" name="placa" id="placa" step="0.01" value="<?php echo $placa; ?>"></label>
        <label>Slika:
            <?php
            if($slika!=""){
                echo "<br><img src='$slika' width='100' height='100'>";
            }
            echo "<input type='hidden' name='postojeca' value='{$slika}'>";
            ?>
        </label>
        <label><input type="file" name="datoteka" id="datoteka"></label>
        <label>
            Aktivan:
        </label>
        <label>
            <input type="radio" name="aktivan" value="1" <?php if($aktivan===true) echo " checked"; ?>> Da
            <input type="radio" name="aktivan" value="0" <?php if($aktivan===false) echo " checked"; ?>> Ne
        </label>
        <label><input type="submit" value="Spremi"></label>
    </form>
    <p><a href="popiszaposlenika.php">Popis zaposlenika</a></p>
    </body>
</html>