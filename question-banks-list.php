<!-- display list of question banks -->
<!-- establish connection to sql -->
<?php include 'connect.php'; ?>
<?php 

$command = "SELECT COUNT(*) FROM question_banks_master";
$result = $conn->query($command);
$qb_count = $result->fetch_assoc()["COUNT(*)"];
$button_count = ceil($qb_count/$_GET["recordnum"]);

//select all question banks
$command = "SELECT * FROM question_banks_master LIMIT " . $_GET["begin"] . "," . $_GET["recordnum"];
$result = $conn->query($command);

?>

<table class="ui celled table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Bank Id</th>
                <th>Description</th>
                <th>Created On</th>
                <th>Created By</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>

<?php
//while there are more question banks, display them on the table
while($row = $result->fetch_assoc()) {
?>

<tr>
    <td data-label="Name"><a href="/interview/question-bank.php?id=<?php echo $row["id"] ?>"><?php echo $row["name"]; ?></a></td>
    <td data-label="Bank Id"><?php echo $row["id"]; ?></td>
    <td data-label="Description"><?php echo $row["description"]; ?></td>
    <td data-label="Created On"><?php echo $row["date"]; ?></td>
    <td data-label="Created By"><?php echo $row["created_by"]; ?></td>
    <td data-label="Delete"><a href="/interview/delete-questionbank.php?id=<?php echo $row["id"]; ?>"><i class="x icon"></i></a></td>
</tr>

<?php
}
?>

    </tbody>
</table>

<div class="ui icon buttons">
    <?php for($i=0;$i<$button_count; $i++) { ?>
        <a href="/interview/question-banks.php?begin=<?php echo ($i*((int)$_GET["recordnum"])); ?>&recordnum=<?php echo $_GET["recordnum"]; ?>">
        <button class="ui button"><?php echo ($i+1); ?></button></a>
    <?php } ?>
</div>
