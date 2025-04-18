<?php
session_start();
ini_set('display_errors', 1);
error_reporting(E_ALL);
session_start();

if(!isset($_SESSION["username"]))
{
    header('location:loginformdb.php');
}

$servername = "sql302.infinityfree.com";
$username = "if0_38692919";
$password = "CarDealershipV3";
$dbname = "if0_38692919_stockdetailsdb";


$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT stock_quantity FROM car_stock WHERE car_type = 'Pickup'";
$result = $conn->query($sql);


$pickupStock = 0;
if ($result && $row = $result->fetch_assoc()) {
    $pickupStock = $row['stock_quantity'];
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Crazy Cars / Pickup</title>
    <link rel="stylesheet" href="carpage.css">
    <link rel="icon" type="image/png" href="flavicon.JFIF">
</head>
<body>
<h1>Pickup Vehicles</h1>

<div class="MenuBar">
    <a href="mainpage.php" class="travel">Homepage</a>
    <a href="purchasepage.php" class="travel">Purchase</a>
    <a href="Mini.php" class="travel">Mini's</a>
    <a href="pickups.php" class="travel">Pick Up Cars</a>
    <a href="sportscars.php" class="travel">Sports cars</a>
    <a href="index.html" class="travel">Logout</a>
    
    <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
        <a href="adminpage.php" class="travel">Admin Panel</a>
    <?php endif; ?>
</div>

<p class="details">
<h3>These are just a few vehicles we have available on our website:</h3>
<table>
    <tr>
        <th>Options</th>
        <th>Preview</th>
        <th>Price</th>
        <th>Color</th>
        <th>Engine Power</th>
        <th>Mileage</th>
        <th>Fuel Type</th>
        <th>Number of Units</th>
    </tr>
    <tr>
        <td>Ford Ranger 3.2 TDCi Wildtrak</td>
        <td><img src="pickup1.jpeg" height="200px" width="250px"></td>
        <td>£26,495</td>
        <td>Silver</td>
        <td>200 Bhp</td>
        <td>45,000</td>
        <td>Diesel</td>
        <td rowspan="3" class="large-unit"><?php echo $pickupStock; ?></td> 
    </tr>
    <tr>
        <td>Isuzu D-Max</td>
        <td><img src="pickup2.jpeg" height="200px" width="250px"></td>
        <td>£18,500</td>
        <td>Red</td>
        <td>180 bhp</td>
        <td>60,000</td>
        <td>Diesel</td>
    </tr>
    <tr>
        <td>Mitsubishi L200 Barbarian</td>
        <td><img src="pickup3.jpeg" height="200px" width="250px"></td>
        <td>£22,000</td>
        <td>White</td>
        <td>150 bhp</td>
        <td>50,000</td>
        <td>Diesel</td>
    </tr>
</table>

<p>There are also many other cars that can be found within our own company.</p>

<h3>Some companies that we have pre-owned cars from:</h3>
<ul>
    <li>Ford's pickup cars</li>
    <li>Honda</li>
    <li>Toyota</li>
    <li>Switch Mobility</li>
    <li>Tata</li>
</ul>

<h3>Exclusive features of our class:</h3>
<p>
    Pickup trucks are designed to carry heavy loads and offer great performance off-road. These cars are perfect for work, adventure, and everything in between.
    Features include large cargo space, towing capacity, and robust design for various terrains.
</p>

<footer>
    <p>This website was created in 2001.</p>
    <p>Employees are Mark Doherty, Cian Kennedy, Keelan Archibald, Mr Wilson, and Eoin.</p>
    <p>&copy; 2001 to 2025</p>
    <h6>Link to other social medias:</h6>
    <a href="https://x.com/?lang=en-gb">Twitter</a>
    <a href="https://en-gb.facebook.com/">Facebook</a>
    <a href="https://bsky.app/">Bluesky</a>
</footer>
</body>
</html>
