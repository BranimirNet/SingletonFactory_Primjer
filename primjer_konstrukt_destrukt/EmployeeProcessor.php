<?php

class EmployeeProcessor{

    private $processing;
    private $startTime;
    private $endTime;
    private $logFile;
    private $processedCount = 0;

    public $firstName;
    public $lastName;
    public $jobTitle;

    private $fileName = "employees.json";

    //konstruktor
    public function __construct(){
        $this->logFile = __DIR__."/processing_log_file_duration.json";
        $this->processing=true;
        $this->startTime = date("Y-m-d H:i:s");
        
        echo "<br>Obrada započela u ".$this->startTime;

        $this->logToJson("start");

    }

    public function setEmpData($firstName,$lastName,$jobTitle){
        $this->firstName=$firstName;
        $this->lastName=$lastName;
        $this->jobTitle=$jobTitle;
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

    public function convertToArray(){
        return [
            "firstName" => $this->firstName,
            "lastName" => $this->lastName,
            "jobTitle" => $this->jobTitle
        ];
    }

    public function processEmployees(){
        echo "<br>Obrađujem podatke zaposlenika...";

        if(!file_exists($this->fileName)){
            return [];
        }

        $jsonData = file_get_contents($this->fileName);
        $employeesArray = json_decode($jsonData,true);

        echo "<table border='1'>";
        echo "<tr>";
        echo "<th>First name</th><th>Last name</th><th>Job title</th>";
        echo "</tr>";
        echo "<tbody>";
        foreach($employeesArray as $emp){
            $this->processedCount++;
            echo "<tr>";
            echo "<td>{$emp['firstName']}</td>";
            echo "<td>{$emp['lastName']}</td>";
            echo "<td>{$emp['jobTitle']}</td>";
            echo "</tr>";
            $this->logToJson("in_progress");
            sleep(2);
        }
        echo "</tbody>";
        echo "</table>";
    }

    private function logToJson($type){

        $logData = [];

        if(file_exists($this->logFile)){
            $json=file_get_contents($this->logFile);
            $logData = json_decode($json,true);
        }

        if(!is_array($logData)) $logData=[];

        if($type==="start"){
            $logData[]=[
                "action"=>"start_processing",
                "time"=>$this->startTime,
                "processing"=>true,
                "processed"=>0
            ];
        }
        elseif($type==="in_progress"){
            $logData[]=[
                "action"=>"in_progress",
                "time"=>date("Y-m-d H:i:s"),
                "processing"=>true,
                "processed"=>$this->processedCount

            ];
        }
        else{
            $logData[]=[
                "action"=>"end_processing",
                "time"=>$this->endTime,
                "processing"=>false,
                "total_processed"=>$this->processedCount
            ];
        }

        file_put_contents($this->logFile,json_encode($logData,JSON_PRETTY_PRINT), LOCK_EX);
    }

    public function __destruct(){
        $this->processing=false;
        $this->endTime=date("Y-m-d H:i:s");
        echo "<br>Obrada završena u ".$this->endTime;
        $this->logToJson("end");
    }
}

?>