<?php
$servername = "localhost";
$username = "root";
$password = "sunny123";
$dbname = "arp";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

//look for user
$command = "SELECT * FROM users WHERE username = '" . $_POST["username"] . "' and password = '" . $_POST["password"] . "'";
$result = $conn->query($command);

//if user exists
if($result->num_rows > 0)
{
    //store session variables and redirect
    $row = $result->fetch_assoc();
    session_start();
    $_SESSION["username"] = $_POST["username"];
    header("Location: /interview/dashboard.php");
}
else
{
    header("Location: /interview/login.php");
}
?>
