<?php
namespace OrdersProject\Offices;

use OrdersProject\Core\BaseEntity;

class Office extends BaseEntity {

    public int $officeCode;
    private string $city;
    protected string $country;

    private string $entityName;
    private bool $success = false;

    public function __construct() {
        $this->file = __DIR__ . "/offices.json";
        $this->entityName = "office";
    }

    public function add(array $data) {
        $this->officeCode  = $data['officeCode'];
        $this->city        = $data['city'];
        $this->country     = $data['country'];

        $this->SaveToJson([
            "officeCode" => $this->officeCode,
            "city"       => $this->city,
            "country"    => $this->country
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