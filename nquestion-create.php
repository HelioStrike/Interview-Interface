<?php include 'connect.php'; ?>
<?php


//finding number of questions
$command = "SELECT * FROM questions_master";
$result = $conn->query($command);

$qcount = 0;

while($row = $result->fetch_assoc()) {
    $qcount += 1;
}
$qcount += 1;

//look for user
$command = "INSERT INTO questions_master(id, question, answer, type, created_by) VALUES(" . $qcount . ",'" . $_POST["question"] . "','" . $_POST["answer"];
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