<?php


function VratiNadredjenog($repTo){
    $conn = connectDB();
    $sql="SELECT e.firstName, e.lastName from employees e where e.employeeNumber = ?";
    $stmt=mysqli_prepare($conn,$sql);
    mysqli_stmt_bind_param($stmt,"i",$repTo);
    mysqli_stmt_execute($stmt);
    $totalResult = mysqli_stmt_get_result($stmt);
    $totalRow = mysqli_fetch_assoc($totalResult);
    if(mysqli_num_rows($totalResult)>0){//broj redova vraćenih sql upitom
        $supFirstName = $totalRow["firstName"];
        $supLastName = $totalRow["lastName"];
    }
    else
    {
        $supFirstName = $supLastName = "";
    }
    

    return $supFirstName." ".$supLastName;
}

function VratiUred($offCode){
    $conn = connectDB();
    $sql="SELECT o.officeCode, o.city from offices o where o.officeCode = ?";
    $stmt=mysqli_prepare($conn,$sql);
    mysqli_stmt_bind_param($stmt,"i",$offCode);
    mysqli_stmt_execute($stmt);
    $totalResult = mysqli_stmt_get_result($stmt);
    $totalRow = mysqli_fetch_assoc($totalResult);

    return $totalRow["city"];
}

?>