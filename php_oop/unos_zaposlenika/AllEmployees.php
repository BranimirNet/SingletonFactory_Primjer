<?php

require_once 'EmployeeDetail.php';

$emp = new EmployeeDetail();
$employees = $emp->getAllEmployees();

?>
<!DOCTYPE html>
<html>
<head>
<title>All Employees</title>




<style>
       table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 70%;
        }

        td, th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
        }

        tr:nth-child(even) {
        background-color: #dddddd;
        }
    </style> 
</style>
</head>

<table>
  <thead>
    <tr>
      <th>First Name</th>
      <th>Last Name</th>
      <th>Job Title</th>
      <th>Email</th>
      <th>Office</th>
      <th>Reports to</th>
      <th>Salary</th>
      <th>Status</th>
      <th>Country</th>
    </tr>
  </thead>
  <tbody>
    <?php
foreach ($employees as $emp) {
    echo "<tr>";
    echo "<td>{$emp['firstName']}</td>";
    echo "<td>{$emp['lastName']}</td>";
    echo "<td>{$emp['jobTitle']}</td>";
    echo "<td>{$emp['email']}</td>";
    echo "<td>{$emp['officeCode']}</td>";
    echo "<td>{$emp['reportsTo']}</td>";
    echo "<td>{$emp['salary']}</td>";
    echo "<td>{$emp['status']}</td>";
    echo "<td>{$emp['country']}</td>";
    echo "</tr>";
}
?>
  </tbody>
</table>
<p><a href='EmployeeForm.php'>Unos novog zaposlenika</a></p>
</html>