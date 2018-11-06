<?php include 'connect.php'; ?>
<?php


//finding number of interviews
$command = "SELECT * FROM next_ids";
$result = $conn->query($command);
$row = $result->fetch_assoc();
$icount = $row["interviews"];

$command = "UPDATE next_ids SET interviews=".($icount + 1)." WHERE interviews=".$icount;
$conn->query($command);

//look for user
$command = "INSERT INTO interviews_master(student_id, interview_id, description, bank_id, start_time, end_time, status, created_by) VALUES('" 
    . $_POST["studentid"] . "'," . $icount . ",'" . $_POST["description"] . "'," . $_POST["qbankid"] . "," . $_POST["starttime"] . "," . 
    $_POST["endtime"] . ",'" . "active" . "','" . $_SESSION["username"] . "')";

$conn->query($command);

header("Location: /interview/interviews.php");

?>