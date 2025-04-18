<?php
session_start();
ini_set('display_errors', 1);
error_reporting(E_ALL);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $servername = "sql302.infinityfree.com";
    $username = "if0_38692919";
    $password = "CarDealershipV3";
    $dbname = "if0_38692919_stockdetailsdb";

    
    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        exit("Connection failed: " . $conn->connect_error);
    }

    
    $carType = trim($conn->real_escape_string($_POST['carType'] ?? ''));
    $personalizedPlate = $conn->real_escape_string($_POST['personalizedPlate'] ?? '');
    $color = $conn->real_escape_string($_POST['color'] ?? '');
    $budgetPrice = floatval($_POST['budgetPrice'] ?? 0);
    $budgetMileage = intval($_POST['budgetMileage'] ?? 0);
    $fuelType = $conn->real_escape_string($_POST['fuelType'] ?? '');
    $firstName = $conn->real_escape_string($_POST['firstName'] ?? '');
    $lastName = $conn->real_escape_string($_POST['lastName'] ?? '');
    $email = $conn->real_escape_string($_POST['email'] ?? '');
    $city = $conn->real_escape_string($_POST['city'] ?? '');
    $telephone = $conn->real_escape_string($_POST['telephone'] ?? '');

    if (empty($carType) || empty($firstName) || empty($email)) {
        exit("Required fields missing.");
    }
    $sql = "INSERT INTO carorders 
            (carType, personalizedPlate, color, budgetPrice, budgetMileage, fuelType, firstName, lastName, email, city, telephone) 
            VALUES 
            ('$carType', '$personalizedPlate', '$color', $budgetPrice, $budgetMileage, '$fuelType', '$firstName', '$lastName', '$email', '$city', '$telephone')";

    if ($conn->query($sql) !== TRUE) {
        exit("Error inserting purchase: " . $conn->error);
    }
    if (strtolower($carType) === 'minis') {
        $sqlUpdateStock = "UPDATE car_stock SET stock_quantity = stock_quantity - 1 WHERE car_type = 'Mini'";

        if ($conn->query($sqlUpdateStock) !== TRUE) {
            exit("Error updating stock for Mini: " . $conn->error);
        }
    } elseif (strtolower($carType) === 'pickups') {
        $sqlUpdateStock = "UPDATE car_stock SET stock_quantity = stock_quantity - 1 WHERE car_type = 'Pickup'";

        if ($conn->query($sqlUpdateStock) !== TRUE) {
            exit("Error updating stock for Pickup: " . $conn->error);
        }
    } elseif (strtolower($carType) === 'sport_cars') {
        $sqlUpdateStock = "UPDATE car_stock SET stock_quantity = stock_quantity - 1 WHERE car_type = 'Sport'";

        if ($conn->query($sqlUpdateStock) !== TRUE) {
            exit("Error updating stock for Sport: " . $conn->error);
        }
    } else {
        exit("Invalid car type selected.");
    }

    $conn->close();
    header("Location: purchasepage.php");
    exit; 
} else {
    exit; 
}
?>
