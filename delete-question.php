<!-- create new question -->
<!-- establish connection with mysql -->
<?php include 'connect.php'; ?>
<?php

//delete question with given id
$command = "DELETE FROM questions_master WHERE id=".$_GET["id"];
$result = $conn->query($command);

header("Location: /interview/questions.php?begin=0&recordnum=10");

?>