<?php
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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = trim($_POST["firstname"]);
    $surname = trim($_POST["surname"]);
    $email = trim($_POST["email"]);
    $rating = intval($_POST["rating"]);
    $review = trim($_POST["review"]);

    if (!empty($firstname) && !empty($surname) && !empty($email) && !empty($review) && $rating >= 1 && $rating <= 5) {
        $stmt = $conn->prepare("INSERT INTO reviewform (`firstname`, `surname`, `email`, `rating`, `review`) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssis", $firstname, $surname, $email, $rating, $review);

        if ($stmt->execute()) {
            header("Location: reviewform.php?success=1");
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "All fields are required and rating must be between 1 and 5.";
    }
}

$conn->close();
?>