<!-- display list of checkboxes for questions -->
<!-- establish connection to sql -->
<?php include 'connect.php'; ?>
<?php 

if($_GET["id"] != '')
{
    //pick questions belonging to a bank(if given)
    $questions = array();
    $command = "SELECT * FROM question_to_bank WHERE bank_id=".$_GET["id"];
    $result = $conn->query($command);

    while($row = $result->fetch_assoc()) {
        $questions[] = $row["question_id"];
    }
}

//select all questions
$command = "SELECT * FROM questions_master";
$result = $conn->query($command);

//while there are more questions, display the checkbox
while($row = $result->fetch_assoc()) {
?>

<div class="inline field">
    <div class="ui <?php if($_GET["id"] != '' && in_array($row["id"], $questions)) { echo "checked";} ?> checkbox">
        <input type="checkbox" name="questions[]" value="<?php echo $row["id"]; ?>" 
        <?php if($_GET["id"] != '' && in_array($row["id"], $questions)) { echo "checked=''";} ?>>
        <label><?php echo $row["question"]; ?></label>
    </div>
</div>

<?php
}
?>
