<?php

require_once "EmployeeProcessor.php";



if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $jobTitle = $_POST["jobTitle"];

    $emp = new EmployeeProcessor();
    $emp->setEmpData($firstName, $lastName, $jobTitle);

    $empData = $emp->convertToArray();

    $emp->SaveToJson($empData);

    echo "<h3>Zaposlenik je uspješno dodan!</h3>";
    header("Location: process.php");
}


?>
