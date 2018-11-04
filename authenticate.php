<!-- establish connection to sql -->
<?php include 'connect.php'; ?>
<?php

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
    //else redirect to login page
    header("Location: /interview/login.php");
}
?>
