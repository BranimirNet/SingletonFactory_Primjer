<!DOCTYPE html>
<html>
    <head>
        <title>Session primjer 1</title>
    </head>
    <body>
        <?php 
        /*
        potrebno je prilikom startanja sesije prvo provjeriti da li je sessija već startana, ako nije, tek onda pokrenuti
session start.

nakon toga, potrebno je napraviti brojanje pristupa stranici (učitanje ili refresh stranice) koji će se svaki puta nakon
tog događaja povećati za 1.

kada brojač dođe do broja 50, napraviti reset brojanja ne uništavajući cijelu sesiju.
        */
        if(session_status()===PHP_SESSION_NONE){
    session_start();
}
        if(!isset($_SESSION["brojac"])){
            $_SESSION["brojac"]=1;
        }
        else
        {
            $_SESSION["brojac"]++;
        }
        echo "<p>Skripta ucitana: ".$_SESSION["brojac"]." puta</p>";

        if($_SESSION["brojac"]==50){
            unset($_SESSION["brojac"]); //unistava samo tu session varijablu 
            




        }



        



        
        
        
        
        
        
        
        ?>

    </body>
</html>