<!-- displays the list of interviews -->

<?php include 'statuses.php'; ?>

<div class="ui text container">
    <form class="ui form" action="set-statuses.php" method="post">
        <?php for($i = 0; $i < $statuslen; $i++) { ?>
            <div class="ui <?php if($_GET["status"][$i] == '1') { echo('checked');} ?> checkbox">
                <input type="checkbox"  name="checks[]" value="<?php echo $i; ?>" <?php if($_GET["status"][$i] == '1') { echo "checked=''";} ?>>
                <label><?php echo $statuses[$i]; ?></label>
            </div>
        <?php } ?>
        <button class="ui button" type="submit">Submit</button>
    </form>
</div>

<!-- establish connection to sql -->
<?php include 'connect.php'; ?>
<?php 

$command = "SELECT COUNT(*) FROM interviews_master";
$result = $conn->query($command);
$interview_count = $result->fetch_assoc()["COUNT(*)"];
$button_count = ceil($interview_count/$_GET["recordnum"]);

//look for user
$command = "SELECT * FROM interviews_master WHERE";
$status = $_GET["status"];
for($i = 0; $i < $statuslen; $i++)
{
    if($status[$i] == '1')
    {
        $command = $command." status='".$statuses[$i]."' OR";
    }
}

$command = substr($command,0,strlen($command)-2);
$command = $command . "LIMIT " . $_GET["begin"] . "," . $_GET["recordnum"];

$result = $conn->query($command);

?>

<table class="ui celled table">
        <thead>
            <tr>
                <th>Interview Id</th>
                <th>Student Id</th>
                <th>Description</th>
                <th>Question Bank Id</th>
                <th>Number of Questions</th>
                <th>Start Time</th>
                <th>End Time</th>
                <th>Status</th>
                <th>View</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>

<?php
//while there are more interviews, push them onto the table
while($row = $result->fetch_assoc()) {
?>

<tr>
    <td data-label="Interview Id"><?php echo $row["interview_id"]; ?></td>
    <td data-label="Student Id"><?php echo $row["student_id"]; ?></td>
    <td data-label="Description"><?php echo $row["description"]; ?></td>
    <td data-label="Question Bank Id"><?php echo $row["question_bank_id"]; ?></td>
    <td data-label="Number of Questions"><?php echo $row["no_of_questions"]; ?></td>
    <td data-label="Start Time"><?php echo $row["start_time"]; ?></td>
    <td data-label="End Time"><?php echo $row["end_time"]; ?></td>
    <td data-label="Status"><?php echo $row["status"]; ?></td>
    <td data-label="View"><a href="/interview/show-interview.php?interview_id='<?php echo($row["interview_id"]); ?>'">
            <button>View</button></a></td>
    <td data-label="Delete">
        <?php if($row["status"] == "active") { ?>
        <a href="/interview/delete-interview.php?id=<?php echo $row["interview_id"]; ?>"><i class="x icon"></i></a>
        <?php } ?>
    </td>
</tr>

<?php
}
?>

    </tbody>
</table>

<div class="ui icon buttons">
    <?php for($i=0;$i<$button_count; $i++) { ?>
        <a href="/interview/interviews.php?status=<?php echo $_GET["status"]; ?>&begin=<?php echo ($i*((int)$_GET["recordnum"])); ?>&recordnum=<?php echo $_GET["recordnum"]; ?>">
        <button class="ui button"><?php echo ($i+1); ?></button></a>
    <?php } ?>
</div>

