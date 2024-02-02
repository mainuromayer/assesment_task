<?php
session_start();
$connection = new mysqli('localhost', 'root', '', 'car-inventory');

if ($connection->connect_error) {
    die ("Connection Failed" . $connection->connect_error);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Car Inventory System</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="./asset/css/style.css">
</head>
    <body>
        <header>
            <h1 class="text-center fw-bold py-4">Car Inventory System</h1>
        </header>

        <section class="container">
            <div class="row border rounded">
                <div class="col-md-6 bg-white bg-gradient p-3 border border-right">
                    <!-- ========================= Form Start ========================= -->
                    <form action="core.php" method="post" id="carForm" enctype="multipart/form-data">
                        <!-- Select Car (Electric/Gas) Start -->
                        <div class="mb-3">
                            <select class="form-select" id="car_type" name="car_type">
                                <option selected>Select car type (Electric/Gas)</option>
                                <option value="electric">Electric</option>
                                <option value="gas">Gas</option>
                            </select>
                        </div>
                        <!-- Select Car (Electric/Gas) End -->

                        <!-- Car Name Start -->
                        <div class="mb-3">
                            <label for="carName" class="form-label">Enter Name:</label>
                            <input type="text" class="form-control" id="carName" name="carName">
                        </div>
                        <!-- Car Name End -->

                        <!-- Car Model Start -->
                        <div class="mb-3">
                            <label for="carModel" class="form-label">Enter model:</label>
                            <input type="text" class="form-control" id="carModel" name="carModel">
                        </div>
                        <!-- Car Model End -->

                        <!-- Car Year Start -->
                        <div class="mb-3">
                            <label for="carYear" class="form-label">Enter year:</label>
                            <input type="number" class="form-control" id="carYear" name="carYear">
                        </div>
                        <!-- Car Year End -->

                        <!-- Electric - Batery Capacity Start -->
                        <div id="electric" class="mb-3">
                            <label for="batteryCapacity" class="form-label">Enter battery capacity (kWh):</label>
                            <input type="number" class="form-control" id="batteryCapacity" name="batteryCapacity">
                        </div>
                        <!-- Electric - Batery Capacity End -->

                        <!-- Gas - Fuel Efficiency Start -->
                        <div id="gas" class="mb-3">
                            <label for="fuelEfficiency" class="form-label">Enter fuel efficiency (MPG):</label>
                            <input type="number" class="form-control" id="fuelEfficiency" name="fuelEfficiency">
                        </div>
                        <!-- Gas - Fuel Efficiency End -->

                        <button type="submit" class="btn btn-primary btn-lg fw-bold form-control">Enter</button>
                    </form>
                    <!-- ========================= Form End ========================= -->
                </div>
                <div class="col-md-6 bg-light bg-gradient p-3 rounded">
                    <!-- ========================= Table Start ========================= -->
                    <table id="carTable" class="display">
                        <thead>
                        <tr>
                            <th>Car Type</th>
                            <th>Name</th>
                            <th>Model</th>
                            <th>Year</th>
                            <th>Battery Capacity (kWh)</th>
                            <th>Fuel Efficiency (MPG)</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                            $result = $connection->query("Select * FROM car");

                            if ($result->num_rows > 0){
                                foreach ($result as $row) {
                                    echo "<tr>";
                                    echo "<td>" . $row['car_type'] . "</td>";
                                    echo "<td>" . $row['car_name'] . "</td>";
                                    echo "<td>" . $row['car_model'] . "</td>";
                                    echo "<td>" . $row['year'] . "</td>";
                                    echo "<td>" . ($row['car_type'] == 'electric' ? $row['battery_capacity'] : '') . "</td>";
                                    echo "<td>" . ($row['car_type'] == 'gas' ? $row['fuel_efficiency'] : '') . "</td>";
                                    echo "</tr>";
                                }
                            }
                        ?>
                        </tbody>

                    </table>
                    <!-- ========================= Table End ========================= -->
                </div>
            </div>
        </section>


        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
        <script src="./asset/js/script.js"></script>

    </body>
</html>