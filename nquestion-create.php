<?php include 'connect.php'; ?>
<?php

//look for user
$command = "INSERT INTO questions_master WHERE username = ";
$result = $conn->query($command);


?>