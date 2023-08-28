<?php 
	include("movies_function.php");
	$display=new display();
	if(!empty($_POST['save']))
	{
		$title = $_POST['title'];
		$genre = $_POST['genre'];
		$release_year = $_POST['release_year'];
		$cast = explode(",", $_POST['cast']);
		$display->addMovie($title, $genre, $release_year, $cast);
	}
	
?>


<ul>
	<li><a href="addmovie.php">addmovie</a></li>
</ul>

<form method="get">
	Search By Genre:<input type="text" name="search" />
	<input type="submit" value="Search"/>
</form>
<br/><br/>

<form method="post">
    Old Title: <input type="text" name="old_title" /><br/>
    New Title: <input type="text" name="new_title" /></br>
    Genre: <input type="text" name="genre" /></br>
    Release Year: <input type="text" name="release_year" /></br>
    Cast: <input type="text" name="cast" />
    <input type="submit" name="edit" value="Edit" />
</form>
<br/><br/>

<form method="get">
	Delete Movie:<input type="text" name="delete" />
	<input type="submit" value="delete"/>
</form>

<br/>

<?php 
// search code executes here 
	global $movies;
	
	if(!empty($_GET['search']))
	{
		$search=$_GET['search'];
		
		$movies=$display->searchMoviesByGenre($search);
	}
	
	// Delete Code Executes Here	
	if(!empty($_GET['delete']))
	{
		$delete=$_GET['delete'];
		
		$movies=$display->deleteMoviesBytitle($delete);
	}

	// Edit Code Executes Here
	if (!empty($_POST['edit'])) 
	{
		$oldTitle = $_POST['old_title'];
		$newTitle = $_POST['new_title'];
		$genre = $_POST['genre'];
		$release_year = $_POST['release_year'];
		$cast = explode(",", $_POST['cast']);

	   
		$result = $display->editMovie($oldTitle, $newTitle, $genre, $release_year, $cast);

		 if ($result == true)
		{
			$movies = $result;
			?>
				<script>alert("Movie details updated successfully.");</script>
			<?php
		} 
		else
		{
			?>
				<script>alert("Movie NOT found in the array.");</script>
			<?php
		}
	}

//display code executes here	
	foreach($movies as $movie)
	{
		$display->displayMovieDetails($movie);
	}
?>