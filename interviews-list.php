<!-- displays the list of interviews -->
<!-- establish connection to sql -->

<div class="ui text container">
    <div class="ui checkbox">
        <input type="checkbox" name="example">
        <label>Active</label>
    </div>
    <div class="ui checkbox">
        <input type="checkbox" name="example">
        <label>OnGoing</label>
    </div>
    <div class="ui checkbox">
        <input type="checkbox" name="example">
        <label>Ended</label>
    </div>
    <div class="ui checkbox">
        <input type="checkbox" name="example">
        <label>Cancelled</label>
    </div>
</div>

<?php include 'connect.php'; ?>
<?php 

$statuses = array("active", "ongoing", "ended", "cancelled");

//look for user
$command = "SELECT * FROM interviews_master WHERE";

$status = $_GET["status"];
for($i = 0; $i < 4; $i++)
{
    if($status[$i] == '1')
    {
        $command = $command." status='".$statuses[$i]."' OR";
    }
}

$command = substr($command,0,strlen($command)-3);
$result = $conn->query($command);

?>

<table class="ui celled table">
        <thead>
            <tr>
                <th>Interview Id</th>
                <th>Student Id</th>
                <th>Description</th>
                <th>Question Bank Id</th>
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
    <td data-label="Question Bank Id"><?php echo $row["bank_id"]; ?></td>
    <td data-label="Start Time"><?php echo ((int)($row["start_time"]/100)).':'.($row["start_time"]%100); ?></td>
    <td data-label="End Time"><?php echo ((int)($row["end_time"]/100)).':'.($row["end_time"]%100); ?></td>
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
