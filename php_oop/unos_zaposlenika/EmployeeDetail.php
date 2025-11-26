<?php

class EmployeeDetail {
    public $firstName;
    public $lastName;       
    public $jobTitle;
    public $email;  
    public $officeCode;
    protected $reportsTo;
    private $salary;    
    private $status = 'Active';
    public $country = "USA";

    public function setData($firstName,$lastName,$jobTitle,$email,$officeCode,$reportsTo,$salary){
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->jobTitle = $jobTitle;
        $this->email = $email;
        $this->officeCode = $officeCode;
        $this->reportsTo = $reportsTo;
        $this->salary = $salary;

}

public function convertToArray(): array{
    return [
        'firstName'=>$this->firstName,
        'lastName'=>$this->lastName,
        'jobTitle'=>$this->jobTitle,
        'email'=>$this->email,
        'officeCode'=>$this->officeCode,
        'reportsTo'=>$this->reportsTo,
        'salary'=>$this->salary,
        'status'=>$this->status,
        'country'=>$this->country
    ];
}
public function SaveToJson($empData): void{
     $file = "employees.json";
    $employees = [];

    if (file_exists($file)) {
        $json = file_get_contents($file);
        $employees = json_decode($json, true);
    }

    $employees[] = $empData;

    file_put_contents($file, json_encode($employees, JSON_PRETTY_PRINT));
}
public function getAllEmployees($file = "employees.json"): mixed {
    if (!file_exists($file)) {
        return [];
    }

    $jsonData = file_get_contents($file);
    $employeesArray = json_decode($jsonData, true);

    if (empty($employeesArray)) {
        return [];
    }

    return $employeesArray;
}
}


?>