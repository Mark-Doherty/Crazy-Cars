<?php
session_start();
ini_set('display_errors', 1);
error_reporting(E_ALL);

if(!isset($_SESSION["username"]))
{
    header('location:loginformdb.php');
}

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


$sql = "SELECT stock_quantity FROM car_stock WHERE car_type = 'Mini'";
$result = $conn->query($sql);


$miniStock = 0;
if ($result && $row = $result->fetch_assoc()) {
    $miniStock = $row['stock_quantity'];
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Crazy Cars / Mini's</title>
    <link rel="stylesheet" href="carpage.css">
    <link rel="icon" type="image/png" href="flavicon.JFIF">
</head>
<body>
<h1>Small Vehicles</h1>

<div class="MenuBar">
    <a href="mainpage.php" class="travel">Homepage</a>
    <a href="purchasepage.php" class="travel">Purchase</a>
    <a href="Mini.php" class="travel">Mini's</a>
    <a href="pickups.php" class="travel">Pick up cars</a>
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
        <td>Mini Cooper 2.0 SD Hatchback 3Door Sport Auto</td>
        <td><img src="mini1.jpeg" height="200px" width="250px"></td>
        <td>£7,765</td>
        <td>Green</td>
        <td>170 Bhp</td>
        <td>102,000</td>
        <td>Petrol</td>
        <td rowspan="3" class="large-unit"><?php echo $miniStock; ?></td>
    </tr>
    <tr>
        <td>Model 2</td>
        <td><img src="mini2.jpeg" height="200px" width="250px"></td>
        <td>£200 to £250</td>
        <td>Crimson or Cyan</td>
        <td>150 bhp to 225 bhp</td>
        <td>4000</td>
        <td>Diesel</td>
    </tr>
    <tr>
        <td>Model 3</td>
        <td><img src="mini3.jpeg" height="200px" width="250px"></td>
        <td>£500 to £550</td>
        <td>Black, Grey or Beige</td>
        <td>200 bhp to 250 bhp</td>
        <td>3000</td>
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
    These types of cars are considered some of the smallest in the world. If you want a simple car designed to hold only essential belongings, this is the car for you.
    Features include Bluetooth music, easy parking due to compact size, and LED lights.
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

