<?php
session_start();

if(!isset($_SESSION["username"]))
{
    header('location:loginformdb.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Crazy Cars / Main Page</title>
    <link rel="stylesheet" href="carpage.css">
    <link rel="icon" type="image/png" href="flavicon.JFIF">
</head>
<body>
    <h1>Crazy Cars</h1>

    <div class="MenuBar">
        <a href="mainpage.php" class="travel">Homepage</a>
        <a href="purchasepage.php" class="travel">Purchase</a>
        <a href="Mini.php" class="travel">Mini's</a>
        <a href="pickups.php" class="travel">Pick up cars</a>
        <a href="sportscars.php" class="travel">Sports Cars</a>
        <a href="index.html" class="travel">Logout</a>
        

        <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
            <a href="adminpage.php" class="travel">Admin Panel</a> 
        <?php endif; ?>
    </div>

    <div class="heroimage"></div>

    <div id="toppart">
        <h2>Welcome to the Crazy Cars website.</h2>
        <p>
            Welcome to the Crazy Cars Homepage! Feel free to browse our stock, which includes many car brands.
            We have more cars at our forecourt than what is shown online — contact us if you're after something specific!
        </p>

        <div class="travelbox">
            <h3><a href="purchasepage.php">Go to purchase page</a></h3>
            <p>Click here to fill out our form about a vehicle you're interested in.</p>
        </div>

        <div class="travelbox">
            <h3><a href="Mini.php">Mini's</a></h3>
            <p>Check out our small compact vehicles — affordable and fuel-efficient!</p>
        </div>
    </div>

    <div id="colorbar"></div>

    <div id="bottompart">
        <div class="travelbox">
            <h3><a href="pickups.php">Pick Ups</a></h3>
            <p>Great for carrying items and delivery tasks. Comes with rear hatch access.</p>
        </div>

        <div class="travelbox">
            <h3><a href="sportscars.php">Sports Cars</a></h3>
            <p>High-performance, fast vehicles for thrill-seekers. Sleek design and strong engines.</p>
        </div>
    </div>

    <footer>
        <p>This website was created in 2001.</p>
        <p>Employees are Mark Doherty, Cian Kennedy, Keelan Archibald, Mr. Wilson, and Eoin.</p>
        <p>&copy; 2001 to 2025</p>
        <h6>Follow us on social media:</h6>
        <a href="https://x.com/?lang=en-gb">Twitter</a>
        <a href="https://en-gb.facebook.com/">Facebook</a>
        <a href="https://bsky.app/">Bluesky</a>
    </footer>
</body>
</html>
