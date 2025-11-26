<?php 
include "zaglavlje.php"; 
?>
        <div class="container">
            <h2>
                <?php
                    if($currentScript=="zaposlenici.php"){
                        echo "Popis zaposlenika";
                    }
                    $conn = connectDB();
                    $limit = 7;
                    $page = isset($_GET["page"]) ? (int)$_GET["page"] : 1;
                    $offset = ($page-1)*$limit;
                    $sql="SELECT
                        e.employeeNumber,
                        e.lastName,
                        e.firstName,
                        e.extension,
                        e.email,
                        e.officeCode,
                        o.city,
                        e.jobTitle,
                        e.reportsTo
                    from employees e 
                    inner join offices o on e.officeCode = o.officeCode order by e.employeeNumber desc LIMIT ? OFFSET ?";
                    $stmt = mysqli_prepare($conn,$sql);//pripremi upit za izvršavanje
                    mysqli_stmt_bind_param($stmt,"ii",$limit,$offset);
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);
                ?>
            </h2>
             <?php
             if(isset($_SESSION["poruka"])){
                echo "<p class='poruka'>".$_SESSION["poruka"]."</p>";
                unset($_SESSION["poruka"]);
             }
             ?>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Ime</th>
                        <th>Prezime</th>
                        <th>Titula</th>
                        <th>Ured</th>
                        <th>E-mail</th>
                        <th>Nadredjeni</th>
                        <th>Akcije</th>
                    </tr>
                </thead>
                <tbody>
                 <?php while($row = mysqli_fetch_assoc($result)){ 
                    $repTo = $row["reportsTo"];
                    $nadredjeni=VratiNadredjenog($repTo);
                    $empNum=$row["employeeNumber"];

                    //za pamćenje ažuriranog retka
                    $klasa="";
                    if(isset($_SESSION["empNumber"])){
                        if($_SESSION["empNumber"]==$empNum){
                            $klasa="azuriran";
                            unset($_SESSION["empNumber"]);
                        }
                    }                   
                    ?>       
                    <tr class="<?php echo $klasa; ?>">
                        <td><?php echo $row["employeeNumber"]; ?></td>
                        <td><?php echo $row["firstName"]; ?></td>
                        <td><?php echo $row["lastName"]; ?></td>
                        <td><?php echo $row["jobTitle"]; ?></td>
                        <td><?php echo $row["city"]; ?></td>
                        <td><?php echo $row["email"]; ?></td>
                        <td><?php echo $nadredjeni; ?></td>
                        <td class="actions">
                            <a href="zaposlenik.php?action=uredi&empNumber=<?php echo $empNum; ?>&page=<?php echo $page; ?>">Uredi</a>
                            <a href="zaposlenikinfo.php?action=brisi&empNumber=<?php echo $empNum; ?>">Briši</a>
                        </td>
                    </tr>
                    <?php }?>
                </tbody>
            </table>
            <?php
            $totalQuery = "SELECT count(*) as total from employees";
            $stmt=mysqli_prepare($conn,$totalQuery);
            mysqli_stmt_execute($stmt);
            $totalResult = mysqli_stmt_get_result($stmt);
            $totalRow = mysqli_fetch_assoc($totalResult);
            $totalPages= ceil($totalRow['total']/$limit);
            ?>
            <div class="paginator">
                <?php
                if($page != 1){
                    $prethodna = $page - 1;
                    echo "<a href='?page=$prethodna'>&laquo;</a>";
                }
                ?>

                 <?php
                for($i=1;$i<=$totalPages;$i++){
                    echo "<a href='?page=$i'";
                    if($i==$page){
                        echo " class='activepage'";
                    }
                    echo ">$i</a>";
                }
                if($page < $totalPages){
                    $sljedeca = $page + 1;
                    echo "<a href='?page=$sljedeca'>&raquo;</a>";
                }

                 ?>

            </div>  
            <p class="novizap"><a href="zaposlenik.php?action=0">Novi zaposlenik</a></p>      
        </div>
 <?php include "podnozje.php"; ?>