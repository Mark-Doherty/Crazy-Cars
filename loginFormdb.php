<?php
session_start();

$servername = "sql302.infinityfree.com";
$username = "if0_38692919"; 
$password = "CarDealershipV3"; 
$dbname = "if0_38692919_loginformdb";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $inputUsername = trim($_POST['username']);
    $inputPassword = trim($_POST['password']); 

    $stmt = $conn->prepare("SELECT id, username, password, role FROM users WHERE username = ?");
    $stmt->bind_param("s", $inputUsername);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();

        if ($inputPassword === $row['password']) {
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['role'] = $row['role']; 

            header("Location: mainpage.php"); 
            exit();
        } else {
            $_SESSION['error_message'] = 'Incorrect password.';
            header("Location: index.html");
            exit();
        }
    } else {
        $_SESSION['error_message'] = 'Username not found.';
        header("Location: index.html");
        exit();
    }
}

$conn->close();
?>

