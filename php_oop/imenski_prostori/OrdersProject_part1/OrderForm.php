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

    <div class="mb-3">
        <label class="form-label">Customer Number:</label>
        <input type="number" name="customerNumber" class="form-control" required>
    </div>

    <input type="hidden" name="entity" value="order">

    <button type="submit" class="btn btn-primary">Save Order</button>

</form>


