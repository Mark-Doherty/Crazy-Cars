<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$servername = "sql302.infinityfree.com";
$username = "if0_38692919";
$password = "CarDealershipV3";
$dbname = "if0_38692919_loginform";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);
  

    if (!empty($username) && !empty($username) && $password >= 5 && $password <= 15) {
        $stmt = $conn->prepare("INSERT INTO loginform (`username`, `password`) VALUES (?, ?)");
        $stmt->bind_param("sssis", $username, $password);

        if ($stmt->execute()) {
            header("Location: loginform.html?success=1");
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "All fields are required and the password must be between 5 and 15.";
    }
}

$conn->close();
?>