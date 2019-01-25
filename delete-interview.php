<!-- create new question -->
<!-- establish connection with mysql -->
<?php include 'connect.php'; ?>
<?php

//delete interview with given id
$command = "UPDATE interviews_master SET status='cancelled' WHERE interview_id=".$_GET["id"];
$result = $conn->query($command);

$command = "DELETE FROM student_interview_mapping WHERE interview_id=".$_GET["id"];
$result = $conn->query($command);

header("Location: /interviews.php?status=1100&begin=0&recordnum=10");

?>