<?php 
include "zaglavlje.php"; 
?>
        <div class="container">
            <h2>
                <?php
                    if($currentScript=="narudzbe.php"){
                        echo "Popis narudžbi";
                    }
                    $orderNumber=$_GET["ordNumber"];
                    $conn = connectDB();
                    $limit = 10;
                    $page = isset($_GET["page"]) ? (int)$_GET["page"] : 1;
                    $offset = ($page-1)*$limit;
                    $sql="SELECT
                        od.orderNumber,
                        od.productCode,
                        od.quantityOrdered,
                        od.priceEach
                        FROM orderDetails od
                        where od.orderNumber = ? order by od.orderNumber desc LIMIT ? OFFSET ?";
                    $stmt = mysqli_prepare($conn,$sql);//pripremi upit za izvršavanje
                    mysqli_stmt_bind_param($stmt,"iii",$orderNumber,$limit,$offset);
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
                        <th>Product code</th>
                        <th>Količina</th>
                        <th>Cijena</th>
                        <th>Ukupno</th>
                    </tr>
                </thead>
                <tbody>
                 <?php 
                 $totalUkupno=0;
                 while($row = mysqli_fetch_assoc($result)){ 
                    $orderNumber = $row["orderNumber"];
                    $prodCode=$row["productCode"];
                    $quantityOrdered=(int)$row["quantityOrdered"];
                    $priceEach=(float)$row["priceEach"];
                    $ukupno=$quantityOrdered*$priceEach;
                    $totalUkupno+=$ukupno;
               
                    ?>       
                    <tr>
                        <td><?php echo $orderNumber; ?></td>                    
                        <td><?php echo $prodCode; ?></td>
                        <td><?php echo $quantityOrdered; ?></td>
                        <td><?php echo $priceEach; ?></td>
                        <td class="actions">
                            <?php echo $ukupno; ?>
                        </td>
                    </tr>
                    <?php }?>
                    <tr>
                        <td colspan="5" class="desno">Ukupno: <?php echo $totalUkupno; ?></td>
                    </tr>
                </tbody>
            </table>
            <p class="novizap"><a href="javascript:history.back(-1)">Natrag</a></p>  
            </div>  
                
        </div>
 <?php include "podnozje.php"; ?>