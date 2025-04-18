<?php
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
$sql = "SELECT stock_quantity FROM car_stock WHERE car_type = 'Sport'";
$result = $conn->query($sql);

$sportStock = 0;
if ($result && $row = $result->fetch_assoc()) {
    $sportStock = $row['stock_quantity'];
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Crazy Cars / Sports Cars</title>
    <link rel="stylesheet" href="carpage.css">
    <link rel="icon" type="image/png" href="flavicon.JFIF">
</head>
<body>
    <h1>Sports Cars</h1>

    <div class="MenuBar">
        <a href="mainpage.php" class="travel">Homepage</a>
        <a href="purchasepage.php" class="travel">Purchases</a>
        <a href="Mini.php" class="travel">Mini's</a>
        <a href="pickups.php" class="travel">Pick Up Cars</a>
        <a href="sportscars.php" class="travel">Sports Cars</a>
        <a href="index.html" class="travel">Logout</a>
        <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
            <a href="adminpage.php" class="travel">Admin Panel</a>
        <?php endif; ?>
    </div>

    <p class="details">
        <h3>Car Details</h3>
        <h3>German automobiles are renowned for their performance, precision, and innovative engineering. At our dealership, we proudly offer a range of German-made vehicles that represent the highest standards in automotive design.</h3>
        <table method="get" action="stockupdate.php">
            <tr>
               <th>Options</th>
               <th>Preview</th>
               <th>Price Range</th>
               <th>Colour</th>
               <th>Engine Power</th> 
               <th>Mileage</th>
               <th>Fuel Type</th>
               <th>Number of Units</th>
            </tr>
            <tr>
                <td>BMW Group</td>
                <td><img src="Sportscar2.jpg" height="200px" width="250px"></td>
                <td>£15,000 - £30,000</td>
                <td>Red, Sky, or Turquoise</td>
                <td>215bhp - 300bhp</td>
                <td>15,000</td>
                <td>Diesel, Petrol, Electric</td>
                <td rowspan="3" id="SportsUpdate"><?php echo $sportStock; ?></td> 
            </tr>

            <tr>
                <td>Audi S3</td>
                <td><p class="details"><img src="Sportscar1.jpg" height="200px" width="250px"></p></td>
                <td>£25,000 - £35,000</td>
                <td>Grey, Red, Blue</td>
                <td>250bhp to 325bhp</td>
                <td>17,000</td>
                <td>Unleaded</td>
            </tr>

            <tr>
                <td>Mercedes Benz</td>
                <td><p class="details"><img src="Sportscar3.jpg" height="200px" width="250px"></p></td>
                <td>£40,000 - £45,000</td>
                <td>Black, Silver, or White</td>
                <td>200bhp to 250bhp</td>
                <td>19,000</td>
                <td>Diesel</td>
            </tr>
        </table>

        <h3>Exclusive Features of Our Class</h3>
        <p>These cars are built for speed and power, with many models capable of exceeding 100 mph (always within legal limits, of course). 

        With sleek, aerodynamic designs, they minimize air resistance for a smoother, more efficient drive. Under the hood, you'll find powerful engines built with the latest technology, delivering both reliability and excitement on the road. German vehicles also feature advanced steering and suspension systems, providing outstanding handling whether you're navigating city streets or enjoying a weekend drive.
        
        If you're looking for a car that combines performance, luxury, and cutting-edge innovation, our selection of German automobiles is sure to impress.</p>
    </p>
    <footer>
        <p>This website was created in 2001.</p>
        <p>Employees are Mark Doherty, Cian Kennedy, Keelan Archibald, Mr. Wilson, and Eoin.</p>
        <p>&copy; 2001 to 2025</p>
        <h6>Links to other social medias</h6>
        <a href="https://x.com/?lang=en-gb">Twitter</a>
        <a href="https://en-gb.facebook.com/">Facebook</a>
        <a href="https://bsky.app/">Bluesky</a>
    </footer>
</body>
</html>

