<!-- create new question -->
<!-- establish connection with mysql -->
<?php include 'connect.php'; ?>
<?php

//delete interview with given id
$command = "DELETE FROM interviews_master WHERE interview_id=".$_GET["id"];
$result = $conn->query($command);

header("Location: /interview/interviews.php");

?>