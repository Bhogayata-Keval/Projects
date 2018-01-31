<?php
	require_once 'include/db.php';
	if(isset($_POST['changename']))
	{
		$contact1=$_POST['mobile'];
		$address=$_POST['address'];
		$update1="UPDATE `shop` SET `address`='$address',`contact`='$contact1' WHERE firstname='$_POST[changename]'";
		mysqli_query($conn,$update1);		
	}


	if(isset($_POST['changename1']))
	{
		$fname=$_POST['fname'];
		$lname=$_POST['lname'];
		$email=$_POST['email'];
		$pass=$_POST['pass'];
		$update1="UPDATE `shop` SET `firstname`='$fname', `lastname`='$lname', `emailid`='$email', `password`='$pass' WHERE firstname='$_POST[changename1]'";
		mysqli_query($conn,$update1);		
	}
?>