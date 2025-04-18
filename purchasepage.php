<?php
session_start();

if(!isset($_SESSION["username"])) {
    header('location:loginformdb.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Crazy Cars / Purchases</title>
    <link rel="stylesheet" href="carpage.css">
    <link rel="icon" type="image/png" href="flavicon.JFIF">
</head>
<body>
    <h1>Purchases and List of Cars</h1>

    <div class="MenuBar">
        <a href="mainpage.php" class="travel">Homepage</a>
        <a href="purchasepage.php" class="travel">Purchase</a>
        <a href="Mini.php" class="travel">Mini's</a>
        <a href="pickups.php" class="travel">Pick Up Cars</a>
        <a href="sportscars.php" class="travel">Sports Cars</a>
        <a href="index.html" class="travel">Logout</a>
        <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
            <a href="adminpage.php" class="travel">Admin Panel</a>
        <?php endif; ?>
    </div>

    <div class="MenuBar">
        <p>Which form do you want to go to?</p>
        <a href="purchasepage.php" class="travel">Purchase Page</a>
        <a href="reviewform.php" class="travel">Review Form</a>
    </div>

    <form method="POST" action="purchasepagedb.php">
        <p>Please fill in this application form for your own car:</p><br>
        <h3>Car Description</h3>
        <label for="carType">Please select a car group:</label><br>
        <select id="carType" name="carType" required>
            <option value="Sport_Cars">Sport</option>
            <option value="Minis">Mini</option>
            <option value="Pickups">Pickup</option>
        </select><br>
        <label for="personalizedPlate">Personalized Number Plate:</label><br>
        <input type="text" name="personalizedPlate" id="personalizedPlate" required><br>
        <label for="color">Preferred Color:</label><br>
        <input type="text" name="color" id="color" required><br>
        <label for="budgetPrice">Budget Price (£):</label><br>
        <input type="number" name="budgetPrice" id="budgetPrice" step="0.01" placeholder="£000.00" required><br>
        <label for="budgetMileage">Preferred Mileage:</label><br>
        <input type="number" name="budgetMileage" id="budgetMileage" required><br>
        <label for="fuelType">Preferred Fuel Type:</label><br>
        <select id="fuelType" name="fuelType" required>
            <option value="diesel">Diesel</option>
            <option value="unleaded">Unleaded</option>
            <option value="gasoline">Gasoline</option>
            <option value="electric">Electric</option>
        </select><br>

        <h3>Your Details</h3>
        <label for="firstName">First Name:</label><br>
        <input type="text" name="firstName" id="firstName" required><br>
        <label for="lastName">Last Name:</label><br>
        <input type="text" name="lastName" id="lastName" required><br>
        <label for="email">Email:</label><br>
        <input type="email" name="email" id="email" required><br>
        <label for="city">City:</label><br>
        <input type="text" name="city" id="city" required><br>
        <label for="telephone">Telephone:</label><br>
        <input type="tel" name="telephone" id="telephone" required><br><br>

        <input type="submit" value="Submit">
    </form>
</body>
</html>

