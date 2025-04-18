

<? php
session_start();
//This sets up the account

session_unset();
//This is done to ensure that the user is logged out of their current session
session_destroy();
//This is the function that will take the user back to login page
header('location:loginformdb.php')
exit;
?>