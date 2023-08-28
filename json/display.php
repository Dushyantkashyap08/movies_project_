<?php
$student = file_get_contents('json_/student_data.json');
$student = json_decode($student); //json data decoded as an array and is displayed in the browser
?>

<?php
if (isset($_GET['did']))
	{
		// Get the name parameter from the URL
		$targetid = $_GET['did'];

		// Read JSON data from the file and parse it into a PHP array
		$student = file_get_contents('json_/student_data.json');
		$student = json_decode($student); 

		// Code to delete data
		foreach ($student as $index => $stud)
		{
			if ($stud->id === $targetid) 
			{
				// Found the entry with the target name, so remove it from the array
				unset($student[$index]);
				// Break the loop after finding the target entry (optional, if there are no duplicate names)
				break;
			}
		}

		// Save the modified PHP array back to the JSON file
		file_put_contents('json_/student_data.json', json_encode(array_values($student), JSON_PRETTY_PRINT));

  }
?>

<!-- update.php -->

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the submitted data from the form
    $id = $_POST['id'];
    $name = $_POST['name'];
    $age = $_POST['age'];
    $city = $_POST['city'];

    // Read JSON data from the file and parse it into a PHP array of objects
    $student = file_get_contents('json_/student_data.json');
    $student = json_decode($student);

    // Find the record with the target id and update its data
    foreach ($student as $stud) {
        if ($stud->id === $id) {
            $stud->name = $name;
            $stud->age = $age;
            $stud->city = $city;
            break;
        }
    }

    // Save the modified PHP array back to the JSON file
    file_put_contents('json_/student_data.json', json_encode($student, JSON_PRETTY_PRINT));

    // Redirect back to the display.php page after updating
    header('Location: display.php');
    exit();
}
?>
<table border="2" width="60%">
    <tr>
		<th>Id</th>
        <th>NAME</th>
        <th>AGE</th>
        <th>CITY</th>
		<th>DELETE</th>
		<th>EDIT</th>
    </tr>
    <?php
    foreach ($student as $stud)
	{
        ?>
        <tr>
			<td><?php echo $stud->id ?></td>
            <td><?php echo $stud->name ?></td>
            <td><?php echo $stud->age ?></td>
            <td><?php echo $stud->city ?></td>
			<td><a href="display.php?did=<?php echo $stud->id ?>">Delete</a></td>
			<td><a href="edit.php?eid=<?php echo $stud->id ?>">Edit</a></td>
        </tr>
		<?php
    }
    ?>
</table>
