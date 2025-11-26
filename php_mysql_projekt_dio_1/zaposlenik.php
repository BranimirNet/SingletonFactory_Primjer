<?php include "zaglavlje.php"; ?>
        <div class="container">

        <?php
        $conn=connectDB();

            if($_SERVER["REQUEST_METHOD"]=="POST"){
                //$empNumber=1750;
                $firstName=$_POST["firstName"];
                $lastName=$_POST["lastName"];
                $jobTitle=$_POST["jobTitle"];
                $office=$_POST["office"];
                $email=$_POST["email"];
                $extension=$_POST["extension"];
                $reportsTo=1216;

                $sqlMaxNum = "SELECT MAX(employeeNumber) as Zadnji from employees";
                $stmt=mysqli_prepare($conn,$sqlMaxNum);
                mysqli_stmt_execute($stmt);
                $totalResult = mysqli_stmt_get_result($stmt);
                $totalRow = mysqli_fetch_assoc($totalResult);
                $empNumber= (int)$totalRow['Zadnji']+1;

                $sql="INSERT INTO employees values (?,?,?,?,?,?,?,?)";
                $stmt=mysqli_prepare($conn,$sql);
                mysqli_stmt_bind_param($stmt,"isssssis",$empNumber,$lastName,$firstName,$extension,$email,$office,$reportsTo,$jobTitle);
                mysqli_stmt_execute($stmt);
                header("Location: zaposlenici.php");
            }

        ?>
            <h2>Novi zaposlenik</h2>

            <form action="zaposlenik.php" method="POST">
                <label for="fname">Ime:</label>
                <input type="text" id="fname" name="firstName" required>

                <label for="lname">Prezime:</label>
                <input type="text" id="lname" name="lastName" required>

                <label for="job">Pozicija:</label>
                <select id="job" name="jobTitle">
                <option value="">-- odaberite poziciju --</option>
                <option value="Sales Rep">Sales Rep</option>
                <option value="Manager">Manager</option>
                <option value="VP Sales">VP Sales</option>
                <option value="Clerk">Clerk</option>
                </select>

                <label for="office">Ured:</label>
                <select id="office" name="office">
                <option value="">-- odaberite ured --</option>
                <?php
                $sql="SELECT officeCode,city from offices";
                $stmt = mysqli_prepare($conn,$sql);//pripremi upit za izvršavanje
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
                while($row = mysqli_fetch_assoc($result)){
                    $offCode=$row["officeCode"];
                    $city=$row["city"];
                    echo "<option value='{$offCode}'>{$city}</option>";
                }
                ?>
                </select>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>

                <label for="email">Ekstenzija:</label>
                <input type="text" id="extension" name="extension" required>

                <button type="submit">Spremi zaposlenika</button>
            </form>
        </div>
 <?php include "podnozje.php"; ?>       