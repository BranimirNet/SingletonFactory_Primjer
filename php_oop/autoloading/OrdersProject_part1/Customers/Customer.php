<?php
namespace OrdersProject\Customers;

use OrdersProject\Core\BaseEntity;

class Customer extends BaseEntity{

    public int $customerNumber;
    private string $customerName;
    protected string $country;

    private string $entityName;

    private bool $success = false;

    public function __construct(){
        $this->file = __DIR__."/customer.json";
        $this->entityName="customer";
    }

    public function add(array $data) {
        $this->customerNumber = $data['customerNumber'];
        $this->customerName = $data['customerName'];
        $this->country = $data['country'];

        $this->SaveToJson([
            'customerNumber' => $this->customerNumber,
            'customerName'=>$this->customerName,
            'country'=>$this->country

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