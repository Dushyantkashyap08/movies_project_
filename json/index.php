
<html>
	<head>
	  <title>JSON File</title> 
	</head>
	<body>
	  <div id="main">
		<!--<div id="header">
		  <h1>Save Form Data in JSON File</h1>
		</div>-->

		<div id="table-data">
		  <form id="submit_form" method="post" action="save_form.php">  
				<table>
				  <tr>
					<td>Id</td>
					<td><input type="text" name="id" /></td>
				  </tr>
				  <tr>
					<td>Name</td>
					<td><input type="text" name="fullname" /></td>
				  </tr>
				  <tr>
					<td>Age</td>
					<td><input type="number" name="age" /></td>
				  </tr>
				  <tr>
					<td>City</td>
					<td>
					  <input type="text" name="city" />   
					</td>
				  </tr>
				  </tr>
				  <tr>
					<td></td>
					<td><input type="submit" name="submit" id="submit" /></td>
				  </tr>
				</table>
		
		  </form>  
		</div>
	  </div>

	</body>
</html>