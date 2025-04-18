<!DOCTYPE html>
<? php
if(!isset($_SESSION["username"]))
{
    header('location:loginformdb.php');
}
?>
<head>
<title>Crazy Cars/records</title>
<link rel="stylesheet" href="carpage.css">
<link rel="icon" type="image/png" href="flavicon.JFIF">
</head>
<body>
<h1>Your records</h1>
    <div class="MenuBar">
        <a href="mainpage.html" class="travel">Main</a>
        <a href="Mini.html" class="travel">Mini's</a>
        <a href="purchasepage.html" class="travel">Purchases</a>
        <a href="pickups.html" class="travel">Pick up cars</a>
        <a href="sportscars.html" class="travel">Sports cars</a>
        <a href="loginpage.html" class="travel">Customer details</a>
       <a href="index.html" class="travel">Logout</a>
        </div>

        <div class="MenuBar">
            <p>Which form do you want to go to?</p>
            <a href="purchasepage.html" class="travel">Purchase page</a>
            <a href="reviewform.html" class="travel">Review form</a>
            <a href="stockupdate.html" class="travel">Stock request</a>
            <a href="records.html" class="travel">records</a>
        </div>
        <h2>Here is the information that you have entered</h2>
        <table>
            
        </table>

<footer>
    <p>This website was created in 2001.
    
    </p>
    <p>Employees are Mark Doherty, Cian Kennedy, Keelan Archibald, Mr Wilson and eoin. </p>
    <p>
        Copyright: 2001 to 2025
    </p>
    <h6>Link to other social medias</h6>
    <a href="https://x.com/?lang=en-gb">Twitter</a>
    <a href="https://en-gb.facebook.com/">Facebook</a>
    <a href="https://bsky.app/">Bluesky</a>
        </footer>
</body>