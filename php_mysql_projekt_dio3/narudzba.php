<?php include "zaglavlje.php"; ?>
        <div class="container">

        <?php
        $conn=connectDB();


            if(isset($_GET["ordNumber"])){

                $orderNumber=$_GET["ordNumber"];
                ?>
                <form action="narudzba.php" method="POST">
                    <input type="hidden" name="orderNumber" value="<?php echo $orderNumber; ?>">
                    <label for="shipDate">Shipped date:</label>
                    <input type="date" id="shipDate" name="shipDate">
                    <button type="submit" name="PromjenaStatus">Promjeni status</button>       
                </form>
                <?php
            }

            if($_SERVER["REQUEST_METHOD"]=="POST"){

                if(isset($_POST["PromjenaStatus"])){
                    //promjena status
                    $orderNumber=$_POST["orderNumber"];
                    $shippedDate=$_POST["shipDate"];
                    $sql="UPDATE orders set shippedDate = ?, status='Shipped' where orderNumber=?";
                    $stmt=mysqli_prepare($conn,$sql);
                    mysqli_stmt_bind_param($stmt,"si",$shippedDate,$orderNumber);
                    if(mysqli_stmt_execute($stmt)){
                        header("Location: narudzbe.php");
                    }
                }
                else{
                //narudžba
                $reqDate=$_POST["reqDate"];
                $shipDate=$_POST["shipDate"];
                $custNumber=$_POST["custNumber"];
                $orderDate=date("Y-m-d");
                $status="In Progress";
                $komentar=$_POST["komentar"];

                //detalji narudžbe
                $quantityOrdered=$_POST["quantityOrdered"];
                $priceEach=$_POST["priceEach"];
                $prodCode=$_POST["prodCode"];
                $ordLineNumber=$_POST["ordLineNumber"];

                $sql="INSERT into orders (orderDate, requiredDate, shippedDate,status,comments,customerNumber) values
                (?,?,?,?,?,?)
                ";
                $stmt=mysqli_prepare($conn,$sql);
                mysqli_stmt_bind_param($stmt,"sssssi",$orderDate,$reqDate,$shipDate,$status,$komentar,$custNumber);
                
                if(mysqli_stmt_execute($stmt)){
                    $currOrderNumber = mysqli_insert_id($conn);//zadnji auto_increment u tablici orders

                    $sql="INSERT into orderdetails (orderNumber,productCode,quantityOrdered,priceEach,orderLineNumber) values
                    (?,?,?,?,?)
                    ";
                    $stmtod=mysqli_prepare($conn,$sql);
                    mysqli_stmt_bind_param($stmtod,"isidi",$currOrderNumber,$prodCode,$quantityOrdered,$priceEach,$ordLineNumber);

                    if(mysqli_stmt_execute($stmtod)){
                        echo "<p>Narudžba sa brojem ".$currOrderNumber." uspješno unesena sa detaljima!</p>";
                    }
                }
            }//za narudžbu i detalje //kraj else
            }

            if($_SERVER["QUERY_STRING"]==""){
        ?>
            <h2>Unos narudžbe</h2>

            <form action="narudzba.php" method="POST">
                <label for="reqDate">Required date:</label>
                <input type="date" id="reqDate" name="reqDate">

                <label for="shipDate">Shipped date:</label>
                <input type="date" id="shipDate" name="shipDate">           

                <label for="office">Customer:</label>
                <select id="custNumber" name="custNumber">
                <option value="">-- odaberite kupca --</option>
                <?php
                $sql="SELECT customerNumber,customerName from customers";
                $stmt = mysqli_prepare($conn,$sql);//pripremi upit za izvršavanje
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
                while($row = mysqli_fetch_assoc($result)){
                    $custNumber=$row["customerNumber"];
                    $custName=$row["customerName"];
                    echo "<option value='{$custNumber}'";
                    echo ">{$custName}</option>";
                }
                ?>
                </select>
                <label for="komentar">Komentar:</label>
                <label><textarea name="komentar" rows="8" cols="50"></textarea></label>

                <h2>::Detalji narudžbe::</h2>

                <label for="qorder">Quantity ordered:</label>
                <input type="number" id="quantityOrdered" name="quantityOrdered">
                
                <label for="priceEach">Price Each:</label>
                <input type="number" id="priceEach" name="priceEach" step=".01">

                <label for="prodCode">Product code:</label>
                <select id="prodCode" name="prodCode">
                <option value="">-- odaberite product code --</option>
                <?php
                $sql="SELECT productCode,productName from products";
                $stmt = mysqli_prepare($conn,$sql);//pripremi upit za izvršavanje
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
                while($row = mysqli_fetch_assoc($result)){
                    $prodCode=$row["productCode"];
                    $prodName=$row["productName"];
                    echo "<option value='{$prodCode}'";
                    echo ">{$prodCode}</option>";
                }
                ?>
                </select>
                <label for="ordLineNumber">Order line number:</label>
                <input type="text" id="ordLineNumber" name="ordLineNumber">
                <button type="submit">Unos narudžbe</button>
            </form>
            <?php }?>

        </div>
 <?php include "podnozje.php"; ?>       