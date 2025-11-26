<?php include "zaglavlje.php"; ?>
        <div class="container">

        <?php
        $conn=connectDB();

            if($_SERVER["REQUEST_METHOD"]=="POST"){
                $empNumber=$_POST["employeeNumber"];
                $firstName=$_POST["firstName"];
                $lastName=$_POST["lastName"];
                $poz=$_POST["jobTitle"];
                $jobTitle=$pozicije[$poz];
                $office=$_POST["office"];
                $email=$_POST["email"];
                $extension=$_POST["extension"];
                $reportsTo=$_POST["reportsTo"];
                $pageNum=$_POST["pageNumber"];

                $_SESSION["empNumber"]=$empNumber;

                if($empNumber==0){
                    $sqlMaxNum = "SELECT MAX(employeeNumber) as Zadnji from employees";
                    $stmt=mysqli_prepare($conn,$sqlMaxNum);
                    mysqli_stmt_execute($stmt);
                    $totalResult = mysqli_stmt_get_result($stmt);
                    $totalRow = mysqli_fetch_assoc($totalResult);
                    $empNumber= (int)$totalRow['Zadnji']+1;

                    $sql="INSERT INTO employees values (?,?,?,?,?,?,?,?)";
                    $stmt=mysqli_prepare($conn,$sql);
                    mysqli_stmt_bind_param($stmt,"isssssis",$empNumber,$lastName,$firstName,$extension,$email,$office,$reportsTo,$jobTitle);
                }
                else
                {
                    //dio za update
                    $sql="UPDATE employees set firstName=?, lastName=?, extension=?, email=?, officeCode=?, reportsTo=?, jobTitle=? 
                    where employeeNumber = ?";
                    $stmt=mysqli_prepare($conn,$sql);
                    mysqli_stmt_bind_param($stmt,"ssssiisi",$firstName,$lastName,$extension,$email,$office,$reportsTo,$jobTitle,$empNumber);
                }
                mysqli_stmt_execute($stmt);
                header("Location: zaposlenici.php?page={$pageNum}");
            }

            if(isset($_GET["action"])){

                if(isset($_GET["empNumber"])){

                    if($_GET["action"]=="uredi"){   
                        $gumb="Ažuriraj";
                        $pageNum=$_GET["page"];
                        //dio za uređivanje
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

                    }
                    
                    if($_GET["action"]=="brisi")
                    {
                        $empNumber=$_GET["empNumber"];
                        $sql="DELETE FROM employees where employeeNumber = ?";
                        $stmt = mysqli_prepare($conn,$sql);
                        mysqli_stmt_bind_param($stmt,"i",$empNumber);
                        mysqli_stmt_execute($stmt);
                        $_SESSION["poruka"]="Zaposlenik sa id-em ".$empNumber." uspješno izbrisan!";
                        header("Location: zaposlenici.php");
                        exit;
                    }               
                 }
                else
                {
                    $gumb="Unesi";
                    $empNum=0;//oznaka da se radi o novom zaposleniku
                    $firstName=$lastName=$extension=$email=$jobTitle="";
                    $offCode=$reportsTo=0;
                }           
            }
        ?>
            <h2><?php echo $gumb; ?> zaposlenika</h2>

            <form action="zaposlenik.php" method="POST">
                <input type="hidden" name="employeeNumber" id="employeeNumber" value="<?php echo $empNum; ?>">
                <input type="hidden" name="pageNumber" id="pageNumber" value="<?php echo $pageNum; ?>">
                <label for="fname">Ime:</label>
                <input type="text" id="fname" name="firstName" value="<?php echo $firstName; ?>" required>

                <label for="lname">Prezime:</label>
                <input type="text" id="lname" name="lastName" value="<?php echo $lastName; ?>" required>

                <label for="job">Pozicija:</label>
                <select id="job" name="jobTitle">
                <option value="">-- odaberite poziciju --</option>
                <?php
                foreach($pozicije as $ozn=>$poz){
                    echo "<option value='{$ozn}'";
                    if($jobTitle==$poz){
                        echo " selected";
                    }
                    echo ">{$poz}</option>";
                }
                ?>
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
                    echo "<option value='{$offCode}'";
                    if($offCode==$officeCode){
                        echo " selected";
                    }
                    echo ">{$city}</option>";
                }
                ?>
                </select>

                <label for="reportsTo">Nadređeni:</label>
                <select id="reportsTo" name="reportsTo">
                <option value="">-- odaberite nadređenog --</option>
                <?php
                $sql="SELECT
                    e.employeeNumber,
                    concat(e.firstName,' ',e.lastName) as 'supervisor',
                    e.jobTitle
                    from employees e where e.jobTitle like '%manager%';";
                $stmt = mysqli_prepare($conn,$sql);//pripremi upit za izvršavanje
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
                while($row = mysqli_fetch_assoc($result)){
                    $supNum=$row["employeeNumber"];
                    $supName=$row["supervisor"];
                    $supTitle=$row["jobTitle"];
                    echo "<option value='{$supNum}'";
                    if($supNum==$reportsTo){
                        echo " selected";
                    }
                    echo ">{$supName} - {$supTitle}</option>";
                }
                ?>
                </select>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="<?php echo $email; ?>" required>

                <label for="email">Ekstenzija:</label>
                <input type="text" id="extension" name="extension" value="<?php echo $extension; ?>" required>

                <button type="submit"><?php echo $gumb; ?> zaposlenika</button>
            </form>

        </div>
 <?php include "podnozje.php"; ?>       