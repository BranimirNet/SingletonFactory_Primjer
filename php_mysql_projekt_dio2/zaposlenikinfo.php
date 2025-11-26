<?php include "zaglavlje.php"; ?>
        <div class="container">

        <?php
        
        $conn=connectDB();

        echo "<h2>Detalji zaposlenika za brisanje:</h2>";

        if(isset($_GET["empNumber"])){

                    $empNum=$_GET["empNumber"];
                    $sql="SELECT * FROM employees where employeeNumber = ?";
                    $stmt = mysqli_prepare($conn,$sql);
                    mysqli_stmt_bind_param($stmt,"i",$empNum);
                    mysqli_stmt_execute($stmt);
                    $totalResult = mysqli_stmt_get_result($stmt);
                    $totalRow = mysqli_fetch_assoc($totalResult);

                    $firstName=$totalRow["firstName"];
                    $lastName=$totalRow["lastName"];
                    $extension=$totalRow["extension"];
                    $email=$totalRow["email"];
                    $officeCode=$totalRow["officeCode"];
                    $reportsTo=$totalRow["reportsTo"];
                    $jobTitle=$totalRow["jobTitle"];

                    echo "<label>Šifra zaposlenika: ".$empNum."</label>";
                    echo "<label>Ime: ".$firstName."</label>";
                    echo "<label>Prezime: ".$lastName."</label>";
                    echo "<label>Email: ".$email."</label>";
                    echo "<label>Ekstenzija: ".$extension."</label>";
                    echo "<label>Office: ".VratiUred($officeCode)."</label>";
                    echo "<label>Nadređeni: ".VratiNadredjenog($reportsTo)."</label>";
                    echo "<label>Titula: ".$jobTitle."</label>";

                    echo "<p>";
                    echo "<a href='zaposlenik.php?action=brisi&empNumber=$empNum' class='brisizap'>Briši</a>";
                    echo "<a href='zaposlenici.php' class='brisizap'>Odustani</a>";
                    echo "</p>";
                
                 }

        ?>    

        </div>
 <?php include "podnozje.php"; ?>       