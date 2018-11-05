<!-- establish connection to sql -->
<?php include 'connect.php'; ?>
<?php 

//select all questions
$command = "SELECT * FROM questions_master";
$result = $conn->query($command);

//while there are more questions, display the checkbox
while($row = $result->fetch_assoc()) {
?>

<div class="inline field">
    <div class="ui checkbox">
        <input type="checkbox" tabindex="0" class="hidden" name="questions[]" value="<?php echo $row["id"]; ?>">
        <label><?php echo $row["question"]; ?></label>
    </div>
</div>

<?php
}
?>
