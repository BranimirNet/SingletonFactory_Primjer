<?php

interface IVehicle{
    public function getType() : string;
}

class Car implements IVehicle{
    public function getType(): string {return "Car"; }
}

class Truck implements IVehicle{
    public function getType(): string {return "Truck"; }
}

class VehicleFactory{

    public static function create(string $type): IVehicle{
        return match($type){
            "Car" => new Car(),
            "Truck" => new Truck(),
            default => throw new Exception("Nepoznat tip vozila")
        };
    }
}

$v1 = VehicleFactory::create("Car");
echo "<br>".$v1->getType();

$v2 = VehicleFactory::create("Truck");
echo "<br>".$v2->getType();

try{
$v3 = VehicleFactory::create("Bus");
echo "<br>".$v2->getType();
}
catch(Exception $e){
    echo $e->getMessage();
}

?>