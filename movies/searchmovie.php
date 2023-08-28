<html>
	<head>
		<title></title>
	</head>
	<body>
		<div>
			<ul>
				<li><a href="addmovie.php">Add Movie</a></li>
				<li><a href="displaymovie.php">Display Movie</a></li>
				<li><a href="searchmovie.php">Search Movie</a></li>
			</ul>
		</div>
		
		<div>
			<form action="displaymovie.php" method="get">
				Enter movie genre:<input type="text" name="mg" /><br>
				<input type="submit" name="save" value="save" />
			</form>
		</div>
	</body>
</html>