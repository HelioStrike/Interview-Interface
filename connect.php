<!-- Establish conenction to sql -->
<?php

session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "arp";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

?>