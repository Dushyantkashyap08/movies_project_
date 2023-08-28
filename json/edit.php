<?php
if (isset($_GET['eid']))
{
    $targetid = $_GET['eid'];

    // Read JSON data from the file and parse it into a PHP array
    $student = file_get_contents('json_/student_data.json');
    $student = json_decode($student);

    // Find the record with the target id
    $targetRecord = null;
    foreach ($student as $stud)
	{
        if ($stud->id === $targetid) 
		{
            $targetRecord = $stud;
            break;
        }
    }

    // If the record is found, display the form for editing
    if ($targetRecord) 
	{
        ?>
        <h2>Edit Student Record</h2>
        <form action="display.php" method="post">
            <input type="hidden" name="id" value="<?php echo $targetRecord->id; ?>">
            <label for="name">Name:</label>
            <input type="text" name="name" value="<?php echo $targetRecord->name; ?>"><br>
            <label for="age">Age:</label>
            <input type="text" name="age" value="<?php echo $targetRecord->age; ?>"><br>
            <label for="city">City:</label>
            <input type="text" name="city" value="<?php echo $targetRecord->city; ?>"><br>
            <input type="submit" value="Update">
        </form>

        <?php
    } 
	else 
	{
        echo "Record not found.";
    }
}
?>
