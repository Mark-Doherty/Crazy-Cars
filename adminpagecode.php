<?php
session_start();

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: loginformdb.php");
    exit();
}

$servername = "sql302.infinityfree.com";
$username = "if0_38692919";
$password = "CarDealershipV3";
$dbname = "if0_38692919_loginformdb";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if (isset($_POST['addUser'])) {
    $username = $conn->real_escape_string($_POST['username']);
    $password = $conn->real_escape_string($_POST['password']);
    $role = $conn->real_escape_string($_POST['role']);

    $sql = "INSERT INTO users (username, password, role) VALUES ('$username', '$password', '$role')";
    if ($conn->query($sql) === TRUE) {
        $_SESSION['message'] = "$username added successfully!";
    } else {
        $_SESSION['message'] = "Error adding user: " . $conn->error;
    }

    header("Location: adminpage.php");
    exit();
}


if (isset($_POST['removeUser'])) {
    $userId = (int) $_POST['userId'];

    $sql = "DELETE FROM users WHERE id = $userId";
    if ($conn->query($sql) === TRUE) {
        $_SESSION['message'] = "User removed successfully!";
    } else {
        $_SESSION['message'] = "Error removing user: " . $conn->error;
    }

    header("Location: adminpage.php");
    exit();
}
?>
