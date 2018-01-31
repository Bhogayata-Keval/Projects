<?php

	require_once 'include/db.php';
	require_once 'include/nav.php';
	echo "<script>alert('fdfjkdjfk');</script>";
	if(isset($_POST['goid']))
	{
		echo "<script>alert('ABC');</script>";
		$getdata="SELECT * FROM product WHERE pid='$_POST[goid]'";
		$runget=mysqli_query($conn,$getdata);
		$fetch=mysqli_fetch_assoc($getdata);

		$_COOKIE['pname']=$data['pname'];
		$_COOKIE['pimage']=$data['pimage'];
		$_COOKIE['price']=$data['price'];

	}
	require_once 'include/footer.php';

?>

