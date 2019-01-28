<!-- create new interview -->
<!-- establish connection with mysql -->
<?php include 'connect.php'; ?>
<?php

//finding number of interviews
$command = "SELECT * FROM next_ids";
$result = $conn->query($command);
$row = $result->fetch_assoc();
$icount = $row["interviews"];

$starttime = $_POST["startyear"].'-'.$_POST["startmonth"].'-'.$_POST["startday"].' '.$_POST["starthour"].':'.$_POST["startminute"].':00';
$endtime = $_POST["endyear"].'-'.$_POST["endmonth"].'-'.$_POST["endday"].' '.$_POST["endhour"].':'.$_POST["endminute"].':00';

$command = "UPDATE next_ids SET interviews=".($icount + 1)." WHERE interviews=".$icount;
$conn->query($command);

//insert new entry into interviews_master table
$command = "INSERT INTO interviews_master(student_id, interview_id, description, question_bank_id, start_time, end_time, status, created_by, no_of_questions) VALUES('" 
    . $_POST["studentid"] . "'," . $icount . ",'" . $_POST["description"] . "'," . $_POST["qbankid"] . ",'" . $starttime . "','" . 
    $endtime . "','" . "active" . "','" . $_SESSION["username"] . "'," . $_POST["numquestions"] . ")";
$conn->query($command);

$command = "INSERT INTO student_interview_mapping(interview_no, start_time, end_time, student_id, no_of_questions) VALUES(".$icount.",'".$starttime."','".$endtime."','".$_POST["studentid"]."',".$_POST["numquestions"].")";
$conn->query($command);

$command = "INSERT INTO interview_questiontable(interview_no, question_bank) VALUES('".$icount."',".$_POST["qbankid"].")";
$conn->query($command);


header("Location: /interview/interviews.php?status=1100&begin=0&recordnum=10");

?>