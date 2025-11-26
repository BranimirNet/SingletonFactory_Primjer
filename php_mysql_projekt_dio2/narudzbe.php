<?php 
include "zaglavlje.php"; 
?>
        <div class="container">
            <h2>
                <?php
                    if($currentScript=="narudzbe.php"){
                        echo "Popis narudžbi";
                    }
                    $conn = connectDB();
                    $limit = 15;
                    $page = isset($_GET["page"]) ? (int)$_GET["page"] : 1;
                    $offset = ($page-1)*$limit;
                    $sql="SELECT
                        o.orderNumber,
                        o.orderDate,
                        o.requiredDate,
                        o.shippedDate,
                        o.status
                        FROM orders o order by o.orderNumber desc LIMIT ? OFFSET ?";
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
                        <th>Broj narudžbe</th>
                        <th>Datum narudžbe</th>
                        <th>Zahtjevani datum isporuke</th>
                        <th>Pravi datum isporuke</th>
                        <th>Status</th>
                        <th>Akcije</th>
                    </tr>
                </thead>
                <tbody>
                 <?php while($row = mysqli_fetch_assoc($result)){ 
                    $orderNumber = $row["orderNumber"];

                    $orderDate=date("d.m.Y",strtotime($row["orderDate"]));
                    $requiredDate=date("d.m.Y",strtotime($row["requiredDate"]));
                    $shippedDate=$row["shippedDate"];
                    if($shippedDate != NULL && !empty($shippedDate)){
                        $shippedDate=date("d.m.Y",strtotime($row["shippedDate"]));
                    }
                    else
                    {
                        $shippedDate="";
                    }
                    

                    $status=$row["status"];
               
                    ?>       
                    <tr>
                        <td><?php echo $orderNumber; ?></td>
                        <td><?php echo $orderDate; ?></td>
                        <td><?php echo $requiredDate; ?></td>
                        <td><?php echo $shippedDate; ?></td>
                        <td><?php echo $status; ?></td>
                        <td class="actions">
                            <a href="narudzba.php?action=uredi&ordNumber=<?php echo $orderNumber; ?>&page=<?php echo $page; ?>">Uredi</a>
                            <a href="narudzbedetalji.php?action=pogledaj&ordNumber=<?php echo $orderNumber; ?>">Pogledaj</a>
                        </td>
                    </tr>
                    <?php }?>
                </tbody>
            </table>
            <?php
            $totalQuery = "SELECT count(*) as total FROM orders o";
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
            <p class="novizap"><a href="narudzba.php?action=0">Nova narudžba</a></p>      
        </div>
 <?php include "podnozje.php"; ?>