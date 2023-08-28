<?php
	include('class_sample.php');
	
	$ob=new sample(); //making an object to access the class named sample
	$ob->show(); //calling the show() function using object '$ob'
	
	echo"<br/>";
	
	$ob->add(100,200); //calling the add() function using object '$ob'
	
?>