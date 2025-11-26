<?php

class EmployeeDetail{

    public $firstName;
    public $lastName;
    public $jobTitle;
    public $email;
    public $officeCode;
    protected $reportsTo;

    private $salary;

    private $status = "Active";
    public $country = "USA";

    private $fileName="employees.json";

    public function setData($firstName,$lastName,$jobTitle,$email,$officeCode,$reportsTo,$salary){
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->jobTitle = $jobTitle;
        $this->email = $email;
        $this->officeCode = $officeCode;
        $this->reportsTo = $reportsTo;
        $this->salary = $salary;
    }

    public function convertToArray(){
        return [
            "firstName" => $this->firstName,
            "lastName" => $this->lastName,
            "jobTitle" => $this->jobTitle,
            "email" => $this->email,
            "officeCode" => $this->officeCode,
            "reportsTo" => $this->reportsTo,
            "salary" => $this->salary,
            "status" => $this->status,
            "country" => $this->country
        ];
    }

    public function SaveToJson($empData){

            $employees = [];

            if(file_exists($this->fileName)){
                $json=file_get_contents($this->fileName);
                $employees = json_decode($json,true);
            }

            $employees[]=$empData;

            file_put_contents($this->fileName,json_encode($employees, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    }

    public function getAllEmployees(){
        if(!file_exists($this->fileName)){
            return [];
        }

        $jsonData = file_get_contents($this->fileName);
        $employeesArray = json_decode($jsonData,true);

        if(empty($employeesArray)){
            return [];
        }

        return $employeesArray;
    }
}

?>