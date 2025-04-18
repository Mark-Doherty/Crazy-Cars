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
    <title>Admin Panel - Crazy Cars</title>
    <link rel="stylesheet" href="carpage.css">
    <link rel="icon" type="image/png" href="flavicon.JFIF">
</head>
<body>
    <h1>Admin Panel - Manage Users</h1>

    <div class="MenuBar">
        <a href="mainpage.php" class="travel">Homepage</a>
        <a href="purchasepage.php" class="travel">Purchase</a>
        <a href="Mini.php" class="travel">Mini's</a>
        <a href="pickups.php" class="travel">Pick Up Cars</a>
        <a href="sportscars.php" class="travel">Sports Cars</a>
        <a href="adminpage.php" class="travel">Admin Panel</a>
        <a href="index.html" class="travel">Logout</a>
    </div>

    <div class="MenuBar">
        <p>Manage Users:</p>
    </div>
    <?php if (!empty($_SESSION['message'])): ?>
        <p style="color: green; font-weight: bold;"><?php echo $_SESSION['message']; unset($_SESSION['message']); ?></p>
    <?php endif; ?>

    <h3>Add New User</h3>
    <form method="POST" action="adminpagecode.php">
        <label for="username">Username:</label><br>
        <input type="text" name="username" id="username" required><br>

        <label for="password">Password:</label><br>
        <input type="password" name="password" id="password" required><br>

        <label for="role">Role:</label><br>
        <select name="role" id="role" required>
            <option value="user">User</option>
            <option value="admin">Admin</option>
        </select><br><br>

        <input type="submit" name="addUser" value="Add User">
    </form>
    <h3>Remove User</h3>
    <form method="POST" action="adminpagecode.php">
        <label for="userId">Select User to Remove:</label><br>
        <select name="userId" id="userId" required>
            <?php
            
            $conn = new mysqli("sql302.infinityfree.com", "if0_38692919", "CarDealershipV3", "if0_38692919_loginformdb");
            if ($conn->connect_error) {
                echo "<option>Error loading users</option>";
            } else {
                $result = $conn->query("SELECT id, username FROM users");
                if ($result && $result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='{$row['id']}'>{$row['username']}</option>";
                    }
                } else {
                    echo "<option>No users found</option>";
                }
                $conn->close();
            }
            ?>
        </select><br><br>

        <input type="submit" name="removeUser" value="Remove User">
    </form>

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
