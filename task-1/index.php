<?php
class Car {
    protected $name;
    protected $model;
    protected $year;

    public function __construct($name, $model, $year){
        $this->name = $name;
        $this->model = $model;
        $this->year = $year;
    }

    public function getCarInfo(){
        return "{$this->year} {$this->name} {$this->model}";
    }
}

class ElectricCar extends Car{
    private $batteryCapacity;

    public function setElectricCarInfo($batteryCapacity){
        $this->batteryCapacity = $batteryCapacity;
    }

    public function getElectricCarInfo(){
        return parent::getCarInfo()."\nBattery Capecity: {$this->batteryCapacity} kWh";
    }
}


class GasCar extends Car{
    private $fuelEfficiency;

    public function setGasCarInfo($fuelEfficiency){
        $this->fuelEfficiency = $fuelEfficiency;
    }

    public function getGasCarInfo(){
        return parent::getCarInfo()."\nFuel Efficiency: {$this->fuelEfficiency} MPG";
    }
}

$carType = readline("Enter car type (Electric/Gas): ");
$carName = readline("Enter Name: ");
$carModel = readline("Enter model: ");
$carYear = readline("Enter year: ");

if("Electric" === $carType):
    $batteryCapacity = readline("Enter battery capacity (kWh): ");
    $electricCar = new ElectricCar($carName, $carModel, $carYear);
    $electricCar->setElectricCarInfo($batteryCapacity);
    echo "\nCar Information:\n".$electricCar->getElectricCarInfo();

elseif("Gas" === $carType):
    $fuelEfficiency = readline("Enter fuel efficiency (MPG):");
    $gasCar = new GasCar($carName, $carModel, $carYear);
    $gasCar->setGasCarInfo($fuelEfficiency);
    echo "\nCar Information:\n".$gasCar->getGasCarInfo();

endif;