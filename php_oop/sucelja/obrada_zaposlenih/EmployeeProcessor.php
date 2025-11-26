<?php 

require_once "IProcessor.php";

class EmployeeProcessor implements IProcessor {
   private $employees = [
    ["firstName" => "Diane", "lastName" => "Murphy", "jobTitle" => "Developer"],
    ["firstName" => "Mary", "lastName" => "Patterson", "jobTitle" => "Designer"],
    ["firstName" => "Jeff", "lastName" => "Firreli", "jobTitle" => "Manager"]
   ];
    public function startProcessing() {
        $poc=new DateTime();
     echo "<br>Obrada zapocela u " .$poc->format("Y-m-d H:i:s.u");
    }
    public function processData(): void {
    echo "<table border='1'>";
    echo "<thead>";
    echo "<tr>";
    echo "<th>First name</th><th>Last name</th><th>Job title</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";

    foreach ($this->employees as $emp) {
        echo "<tr>";
        echo "<td>{$emp['firstName']}</td>";
        echo "<td>{$emp['lastName']}</td>";
        echo "<td>{$emp['jobTitle']}</td>";
        echo "</tr>";
    }

    echo "</tbody>";
    echo "</table>";
}
public function endProcessing() {
    $zav=new DateTime();
    $zav->modify('+2 days');//simulacija duze obrade
    echo "<br>Obrada zavrsena u " .$zav->format("Y-m-d H:i:s.u");
    
    }
}




?>