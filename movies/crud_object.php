<?php


	include("INSERT_FUNCTION.php");
	$ob=new data();

    if(!empty($_POST['save']))
    { 
        if (!empty($_POST['editid'])) 
			{
				$msg=$ob->insert($_POST); // it will execute the edit option
				
			} 
		else 
			{
				$msg=$ob->insert($_POST); // it will execute insert option
			}
        echo $msg;
    }

	if(!empty($_GET['eid']))
	{
		$r=$ob->edit($_GET);
	}

	if (!empty($_GET['did']))
	{
		$msg=$ob->del($_GET);
		echo $msg;
    }
	
	// if (!empty($_GET['save']))
	// {
		// $msg=$ob->upload($_GET);
		// echo $msg;
    // }
?>

<form method="post" enctype="multipart/form-data">
	
			<input type="hidden" name="editid" value="<?php if(!empty($r['id'])) echo $r['id']?>" /><br><br>
	Enter Name<input type="text" name="name" value="<?php if(!empty($r['name'])) echo $r['name']?>" /></br></br>
	Enter Marks<input type="text" name="marks" value="<?php if(!empty($r['marks'])) echo $r['marks']?>" /></br></br>
	Upload File: <input type="file" name="f" />
	<input type="submit" name="save" value="submit"/>
</form>

<table border="2" width="80%">
	<tr>
		<th>ID</th>
		<th>Name</th>
		<th>Marks</th>
		<th>Images</th>
		<th>DELETE</th>
		<th>EDIT</th>
	</tr>
	<?php
		$data=$ob->show();
		foreach($data as $row)
		{
				
			?>
			
				<tr>
					<td><?php echo $row['id']?></td>
					<td><?php echo $row['name']?></td>
					<td><?php echo $row['marks']?></td>
					<td><img width="50" height="50" src="uploadedimages/<?php echo $row['images']?>" /></td>
					<td><a href="crud_object.php?did=<?php echo $row['id']?>">Delete</a></td>
					<td><a href="crud_object.php?eid=<?php echo $row['id']?>">Edit</a></td>
				</tr>
					
			<?php 
				
		}	
    ?>
  </table>
  <br><br>
			<form>
				Enter Name: <input type="text" name="s" />
				<input type="submit" value="search" />
			</form>

		