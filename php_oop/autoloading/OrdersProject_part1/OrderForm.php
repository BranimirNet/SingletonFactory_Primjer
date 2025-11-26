<?php

require_once __DIR__.'/bootstrap.php';

use OrdersProject\Orders\Order;

//require_once __DIR__.'/Core/IEntity.php';
//require_once __DIR__.'/Core/BaseEntity.php';
//require_once __DIR__.'/Orders/Order.php';

$data=Order::VratiSveKupce();
$brojNarudzbe=Order::BrojNarudzbe();
?>




<h2>Order Form</h2>

<form action="processForm.php" method="POST" class="mt-3">

    <div class="mb-3">
        <label class="form-label">Order Number:</label>
        <input type="number" name="orderNumber" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Order Date:</label>
        <input type="date" name="orderDate" class="form-control" required>
    </div>

    <div>
        <label>Unesite customer number:</label>
        <select name="customerNumber">
            <?php
            foreach($data as $row){
                echo "<option value='{$row["customerNumber"]}'>".$row["customerName"]."</option>";
            }
            ?>
        </select>
    </div> 

    <input type="hidden" name="entity" value="order">

    <button type="submit" class="btn btn-primary">Save Order</button>

</form>


