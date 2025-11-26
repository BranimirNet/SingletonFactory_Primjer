<?php
namespace OrdersProject\Orders;

use OrdersProject\Core\BaseEntity;

class Order extends BaseEntity {

    public int $orderNumber;
    private string $orderDate;
    protected int $customerNumber;

    private string $entityName;
    private bool $success = false;

    public function __construct() {
        $this->file = __DIR__ . "/orders.json";
        $this->entityName = "order";
    }

    public static function VratiSveKupce() {
        $file=__DIR__ . "/../Customers/customers.json";
        $data=json_decode(file_get_contents($file), true);
        return $data;
    }

    public static function BrojNarudzbe() {
        return rand(1000, 50000);
    }

    public function add(array $data) {
        $this->orderNumber    = $data['orderNumber'];
        $this->orderDate      = $data['orderDate'];
        $this->customerNumber = $data['customerNumber'];

        $this->SaveToJson([
            "orderNumber"    => $this->orderNumber,
            "orderDate"      => $this->orderDate,
            "customerNumber" => $this->customerNumber
        ]);

        $this->success = true;
    }

    public function __destruct(){
        $logFile = __DIR__."/../logger.json";

        $logEntry = [
            "entity"   => $this->entityName,
            "datetime" => date("Y-m-d H:i:s"),
            "success"  => $this->success ? "true" : "false"
        ];

        $logs = [];
        if(file_exists($logFile)){
            $logs = json_decode(file_get_contents($logFile), true);
        }

        $logs[] = $logEntry;

        file_put_contents($logFile, json_encode($logs, JSON_PRETTY_PRINT), LOCK_EX);

        echo "<br>Uspješan zapis u log";
    }
}
?>