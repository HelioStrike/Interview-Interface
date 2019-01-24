<!-- displays the list of interviews -->

<?php include 'statuses.php'; ?>

<div class="ui text container">
    <form class="ui form" action="set-statuses-search.php" method="post">
        <?php for($i = 0; $i < $statuslen; $i++) { ?>
            <div class="ui <?php if($_GET["status"][$i] == '1') { echo('checked');} ?> checkbox">
                <input type="checkbox"  name="checks[]" value="<?php echo $i; ?>" <?php if($_GET["status"][$i] == '1') { echo "checked=''";} ?>>
                <label><?php echo $statuses[$i]; ?></label>
            </div>
        <?php } ?>
        <input type="hidden" name="student_id" value="<?php echo $_GET["student_id"]; ?>" />
        <button class="ui button" type="submit">Submit</button>
    </form>
</div>

<!-- establish connection to sql -->
<?php include 'connect.php'; ?>
<?php 

//look for interviews
$command = "SELECT * FROM interviews_master WHERE student_id='".$_GET["student_id"]."' AND (";

$status = $_GET["status"];
for($i = 0; $i < $statuslen; $i++)
{
    if($status[$i] == '1')
    {
        $command = $command." status='".$statuses[$i]."' OR";
    }
}

$command = substr($command,0,strlen($command)-3);
$command = $command.")";
$result = $conn->query($command);

?>

<table class="ui celled table">
        <thead>
            <tr>
                <th>Interview Id</th>
                <th>Student Id</th>
                <th>Description</th>
                <th>Question Bank Id</th>
                <th>Created On</th>
                <th>Status</th>
                <th>View</th>
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
    <td data-label="Start Time"><?php echo $row["created_on"]; ?></td>
    <td data-label="Status"><?php echo $row["status"]; ?></td>
    <td data-label="View"><a href="/interview/show-interview.php?interview_id='<?php echo($row["interview_id"]); ?>'">
            <button>View</button></a></td>
</tr>

<?php
}
?>

    </tbody>
</table>
