<?php
namespace OrdersProject\Employees;

use OrdersProject\Core\BaseEntity;

class Employee extends BaseEntity{

    private string $firstName;
    private string $lastName;
    protected string $email;
    public int $employeeNumber;

    private string $entityName;
    private bool $success = false;

    public function __construct(){
        $this->file = __DIR__.'/employee.json';
        $this->entityName = "employee";
    }

    public function add(array $data){
        $this->employeeNumber = $data['employeeNumber'];
        $this->firstName = $data['firstName'];
        $this->lastName = $data['lastName'];
        $this->email = $data['email'];
        $this->success=true;

        $this->SaveToJson([
            'employeeNumber'=>$this->employeeNumber,
            'firstName'=>$this->firstName,
            'lastName'=>$this->lastName,
            'email'=>$this->email
        ]);
    }

    public function __destruct(){
        $logFile = __DIR__."/../logger.json";

        $logEntry = [
            "entity"=>$this->entityName,
            "datetime"=>date("Y-m-d H:i:s"),
            "success"=> $this->success ? "true" : "false"
        ];

        $logs=[];
        if(file_exists($logFile)){
            $logs = json_decode(file_get_contents($logFile),true);
        }

        $logs[]=$logEntry;
        file_put_contents($logFile,json_encode($logs,JSON_PRETTY_PRINT),LOCK_EX);
        echo "<br>Uspješan zapis u log";
    }
}

?>