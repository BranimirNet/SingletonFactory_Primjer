<?php

abstract class Employee{

    protected $firstName;
    protected $lastName;
    protected $jobTitle;

    protected $godiste;

    public function __construct($firstName,$lastName,$jobTitle,$godiste){
        $this->firstName=$firstName;
        $this->lastName=$lastName;
        $this->jobTitle=$jobTitle;
        $this->godiste=$godiste;
    }

    abstract public function CalculateSalary();

    abstract public function IzracunBonusa();

    public function GetEmployeeInfo() {
        echo "<br>Employee {$this->firstName}, {$this->lastName}, titula {$this->jobTitle}";
    }
}

class RegularEmployee extends Employee{

    public function CalculateSalary(){
        return 2000+0.05 * 2000;
    }

    public function IzracunBonusa(){
        $godina = date("Y")-$this->godiste;
        if($godina>30 && $godina<50){
            $bonus = 2000;
        }
        else{
            $bonus=0;
        }
        return $bonus;
    }

    public function GetAllInfo(){
        $this->GetEmployeeInfo();
        echo "<br>Plaća: ".$this->CalculateSalary();
    }
}

class ManagerEmployee extends Employee{

    public function CalculateSalary(){
        return 3000 + 0.15 *3000;
    }

    public function IzracunBonusa(){
        $godina = date("Y")-$this->godiste;
        if($godina > 40 && $godina < 50){
            $bonus = 2000*rand(100,200)/100;
        }
        else
        {
            $bonus = 100;
        }
        return $bonus;
    }

    public function GetManagerInfo(){
        $this->GetEmployeeInfo();
        echo "<br>Poseban obračun: ".$this->CalculateSalary();
    }
}

$emp1 = new RegularEmployee("Ana","Anić","Sales Rep",1981);
$emp2 = new ManagerEmployee("Robert","Robić","Manager",1977);

$emp1->GetAllInfo();
echo "<br>Bonus: ".$emp1->IzracunBonusa();
$emp2->GetManagerInfo();
echo "<br>Bonus: ".$emp2->IzracunBonusa();

?>