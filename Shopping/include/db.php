<?php

	session_start();
	ob_start();
	
	$server="localhost";
	$username="keval";
	$password="hello123";
	$db="shopcart";
	$conn=mysqli_connect($server, $username, $password, $db);	
?>