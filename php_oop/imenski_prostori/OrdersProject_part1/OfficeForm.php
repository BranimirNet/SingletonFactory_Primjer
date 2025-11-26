<h2>Office Form</h2>

<form action="processForm.php" method="POST" class="mt-3">

    <div class="mb-3">
        <label class="form-label">Office Code:</label>
        <input type="number" name="officeCode" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">City:</label>
        <input type="text" name="city" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Country:</label>
        <input type="text" name="country" class="form-control" required>
    </div>

    <input type="hidden" name="entity" value="office">

    <button type="submit" class="btn btn-primary">Save Office</button>

</form>


