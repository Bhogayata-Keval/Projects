<?php

	require_once '../include/db.php';

	if(isset($_POST['del_id']))
	{
		//$filedel="SELECT pimage FROM product WHERE pid='$_POST[del_id]'";
		$qdel="DELETE FROM product WHERE pid='$_POST[del_id]'";
		//delete('img/$filedel');
		mysqli_query($conn,$qdel);
	}

	if(isset($_POST['cdel_id']))
	{
		//$filedel="SELECT pimage FROM product WHERE pid='$_POST[del_id]'";
		$qdel="DELETE FROM `category` WHERE c_id='$_POST[cdel_id]'";
		//delete('img/$filedel');
		mysqli_query($conn,$qdel);
	}

	if(isset($_POST['del_id2']))
	{
		//$filedel="SELECT pimage FROM product WHERE pid='$_POST[del_id]'";
		$qdel="DELETE FROM cart WHERE pid='$_POST[del_id2]'";
		//delete('img/$filedel');
		mysqli_query($conn,$qdel);
	}

?>