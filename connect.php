<?php

session_start();

$servername = "ec2-18-206-54-177.compute-1.amazonaws.com";
$username = "sandeep";
$password = "sandeep123";
$dbname = "interview_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

?>