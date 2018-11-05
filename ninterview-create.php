<?php include 'connect.php'; ?>
<?php


//finding number of questions
$command = "SELECT * FROM interviews_master";
$result = $conn->query($command);

$icount = 0;

while($row = $result->fetch_assoc()) {
    $icount += 1;
}
$icount += 1;

//look for user
$command = "INSERT INTO interviews_master(id, description, bank_id, start_time, end_time, status, created_by) VALUES(" . $icount . ",'" . 
    $_POST["description"] . "'," . $_POST["qbankid"] . "," . $_POST["starttime"] . "," . 
    $_POST["endtime"] . ",'" . "active" . "','" . $_SESSION["username"] . "')";

$conn->query($command);

header("Location: /interview/interviews.php");

?>