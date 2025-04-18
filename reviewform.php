<?php
session_start();
if (!isset($_SESSION["username"])) {
    header('location:loginformdb.php');
    exit();
}

error_reporting(E_ALL);
ini_set('display_errors', 1);

$servername = "sql302.infinityfree.com";
$username = "if0_38692919";
$password = "CarDealershipV3";
$dbname = "if0_38692919_reviewformdb";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Crazy Cars / Reviews</title>
    <link rel="stylesheet" href="carpage.css">
    <link rel="icon" type="image/png" href="flavicon.JFIF">
</head>
<body>
    <h1>Purchases and List of Items</h1>

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

    <form method="POST" action="reviewFormdb.php">
        <label for="firstname">Enter your first name here:</label><br>
        <input type="text" name="firstname" id="firstname"><br>

        <label for="surname">Enter your surname here:</label><br>
        <input type="text" name="surname" id="surname"><br>

        <label for="email">Enter your email address here:</label><br>
        <input type="email" name="email" id="email"><br>

        <label for="rating">Enter your rating here:</label><br>
        <input type="number" name="rating" id="rating" min="1" max="5"><br>

        <label for="review">Enter your review here:</label><br>
        <input type="text" name="review" id="review"><br><br>

        <input type="submit" value="Send Details"><br>
    </form>

    <h2>Customer Reviews</h2>
    <?php
    $sql = "SELECT firstname, surname, rating, review FROM reviewform ORDER BY id DESC";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "Name: " . htmlspecialchars($row['firstname'] . " " . $row['surname']) . "<br>";
            echo "Rating: " . intval($row['rating']) . "/5<br>";
            echo "Review: " . htmlspecialchars($row['review']) . "<br><br>";
        }
    } else {
        echo "No reviews yet.";
    }
    ?>

    <footer>
        <p>This website was created in 2001.</p>
        <p>Employees are Mark Doherty, Cian Kennedy, Keelan Archibald, Mr. Wilson, and Eoin.</p>
        <p>&copy; 2001 to 2025</p>
        <h6>Links to Other Social Medias</h6>
        <a href="https://x.com/?lang=en-gb">Twitter</a>
        <a href="https://en-gb.facebook.com/">Facebook</a>
        <a href="https://bsky.app/">Bluesky</a>
    </footer>
</body>
</html>
<?php $conn->close(); ?>
