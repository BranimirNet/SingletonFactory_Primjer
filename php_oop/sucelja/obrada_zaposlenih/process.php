<?php 

require_once "EmployeeProcessor.php";

$proc=new EmployeeProcessor();
$proc->startProcessing();       
$proc->processData();
$proc->endProcessing();


?>