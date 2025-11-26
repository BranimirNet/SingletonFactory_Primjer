<?php

require_once 'EmployeeDetail.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $jobTitle = $_POST["jobTitle"];
    $email = $_POST["email"];
    $officeCode = $_POST["officeCode"];
    $reportsTo = $_POST["reportsTo"];
    $salary = $_POST["salary"];

    $emp = new EmployeeDetail();
    $emp->setData($firstName, $lastName, $jobTitle, $email, $officeCode, $reportsTo, $salary);

    $empData = $emp->convertToArray();

   $emp->SaveToJson($empData);

/*echo "<h3>Zaposlenik je uspješno dodan.</h3>";
echo "<p><a href='EmployeeForm.php'>Unos novog zaposlenika</a></p>";
echo "<pre>";
print_r($empData);
echo"</pre>";*/
header("Location: AllEmployees.php");
}

    




?>