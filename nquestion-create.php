<!-- create new question -->
<!-- establish connection with mysql -->
<?php include 'connect.php'; ?>
<?php

//finding number of questions
$command = "SELECT * FROM next_ids";
$result = $conn->query($command);
$row = $result->fetch_assoc();
$qcount = $row["questions"];

$command = "UPDATE next_ids SET questions=".($qcount + 1)." WHERE questions=".$qcount;
$conn->query($command);

//look for user
$command = "INSERT INTO questions_master(id, question, answer, type, created_by) VALUES(" . $qcount . ",'" . $_POST["question"] . "','" . $_POST["answer"] . "')";
if($_POST["type"] == 1)
{
    $command = $command . "','theory'";
}
else
{
    $command = $command . "','mcq'";
}

$command = $command . ",'" . $_SESSION["username"] . "')";

$result = $conn->query($command);

header("Location: /interview/questions.php");

?>