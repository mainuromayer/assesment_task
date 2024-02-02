<?php
session_start();
$connection = new mysqli('localhost', 'root', '', 'car-inventory');

if ($connection->connect_error) {
    die ("Connection Failed" . $connection->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['car_type'])) {
        $carType = $_POST['car_type'];
    }
    $carName = $_POST['carName'];
    $carModel = $_POST['carModel'];
    $carYear = $_POST['carYear'];

    if ($carType === "electric") {
        $batteryCapacity = $_POST['batteryCapacity'];
        $sql = "INSERT INTO car (car_type, car_name, car_model, year, battery_capacity) VALUES ('$carType', '$carName', '$carModel', $carYear, $batteryCapacity)";
    } elseif ($carType === "gas") {
        $fuelEfficiency = $_POST['fuelEfficiency'];
        $sql = "INSERT INTO car (car_type, car_name, car_model, year, fuel_efficiency) VALUES ('$carType', '$carName', '$carModel', $carYear, $fuelEfficiency)";
    } else {
        echo "Invalid car type!";
    }

    if (!empty($sql) && $connection->query($sql) === true) {
        header("Location:./");
    } else {
        echo $connection->error;
    }
}

$connection->close();
