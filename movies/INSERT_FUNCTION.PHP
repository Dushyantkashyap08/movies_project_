<?php

	class data
	{
		function insert($data)
			{
				$connect=mysqli_connect("localhost","root","","adminpanel")or die("conncetion failed");
				if(!empty($_POST['save']))
				{
					$filename=$_FILES['f']['name'];
					$filepath=$_FILES['f']['tmp_name'];
					// $imagename=explode(".",$filename); 
					// $ext=$imagename[1];
					
					// echo "<br/>";
					// $query="show table status like 'images'";
					// $result=mysqli_query($connect,$query);
					// $row=mysqli_fetch_assoc($result);
					
					// $id=$row['Auto_increment'];
					// $newfilename=$id.".".$ext;
					$name=$data['name'];
					$marks=$data['marks'];
					if(!empty($data['editid']))
					{
						$id=$data['editid'];
						$query="update class set name='$name', marks='$marks', images='$filename' where id='$id'";
					}
					else
					{
						$query="insert into class(name,marks,images) values('$name',$marks,'$filename')";
					}
						if(mysqli_query($connect,$query))
						{	
							return("Record Inserted");
							 move_uploaded_file($filepath,"uploadedimages/".$filename);
						}
						else
						{
							return("Record Not Inserted");
						}
				}					
			}
			
			function show()
			{
				$connect=mysqli_connect("localhost","root","","adminpanel")or die("conncetion failed");
				if(!empty($_GET['s']))
				{
					$searchname=$_GET['s'];
					$query="select * from class where name like '%$searchname%'";
				}                         
				else  
				{
					$query="select * from class";
				}	
				$result=mysqli_query($connect,$query);
				while($row=mysqli_fetch_assoc($result))
				{
					$data[]=$row;
				}
				return($data);
				
			}
			
			function del($data)
			{
				$connect=mysqli_connect("localhost","root","","adminpanel")or die("conncetion failed");
				
				$did=$data['did'];
				$query="delete from class where id='$did'";
				if(mysqli_query($connect,$query))
				{	
					return("Record Deleted");
				}
				else
				{
					return("Record NOT Deleted");
				}			
			}
			
			function edit($data)
			{
				$connect=mysqli_connect("localhost","root","","adminpanel")or die("conncetion failed");
				if(!empty($data['eid']))
					{
						$id=$data['eid'];
						$query="select * from class where id=$id";
						$result=mysqli_query($connect,$query);
						$r=mysqli_fetch_assoc($result);
						return $r;
					}
			}
				
	}
?>	