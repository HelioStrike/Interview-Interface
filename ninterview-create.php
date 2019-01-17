<!-- create new interview -->
<!-- establish connection with mysql -->
<?php include 'connect.php'; ?>
<?php

//finding number of interviews
$command = "SELECT * FROM next_ids";
$result = $conn->query($command);
$row = $result->fetch_assoc();
$icount = $row["interviews"];

$shours = (ord($_POST["starttime"][0]) - ord('0'))*10 + ord($_POST["starttime"][1]) - ord('0');
$smins = (ord($_POST["starttime"][3]) - ord('0'))*10 + ord($_POST["starttime"][4]) - ord('0');
$ehours = (ord($_POST["endtime"][0]) - ord('0'))*10 + ord($_POST["endtime"][1]) - ord('0');
$emins = (ord($_POST["endtime"][3]) - ord('0'))*10 + ord($_POST["endtime"][4]) - ord('0');

if($_POST["studentid"] == '' || $_POST["description"] == '' || $_POST["qbankid"] == '' || strlen($_POST["starttime"]) != 5 ||
     strlen($_POST["endtime"]) != 5 || shours > 23 || shours < 0 || smins < 0 || smins > 59 || 
     ehours > 23 || ehours < 0 || emins < 0 || emins > 59)
{
    header("Location: /interview/ninterview.php");
    exit();
}

$command = "UPDATE next_ids SET interviews=".($icount + 1)." WHERE interviews=".$icount;
$conn->query($command);

//insert new entry into interviews_master table
$command = "INSERT INTO interviews_master(student_id, interview_id, description, bank_id, start_time, end_time, status, created_by) VALUES('" 
    . $_POST["studentid"] . "'," . $icount . ",'" . $_POST["description"] . "'," . $_POST["qbankid"] . "," . ($shours*100+$smins) . "," . 
    ($ehours*100+$emins) . ",'" . "active" . "','" . $_SESSION["username"] . "')";

//insert new entry into interviews_master table
$command = "INSERT INTO student_interview_mapping(student_id, interview_id) VALUES('" . $_POST["studentid"] . "'," . $icount;

$conn->query($command);

header("Location: /interview/interviews.php");

?>