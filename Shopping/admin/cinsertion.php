<?php
//  <input type='text' class='form-control' id='ipcategory'><br>

	require_once '../include/db.php';
	

	if(isset($_POST['csubmitname']) )
	{
		
		echo $file_name2=$_FILES['imgfile2']['name'];
		echo "<script>alert($file_name2);</script>";
		$file_temp2=$_FILES['imgfile2']['tmp_name'];
		echo "<script>alert($file_name2);</script>";
		$data_file2=$_POST['nname'].'_'.$file_name2;
		$path2='../cimg/'.$data_file2;
		move_uploaded_file($file_temp2, $path2);	
			
	
		$sql1="INSERT INTO `category` (`c_id`,`c_name`,`c_des`,`c_img`) VALUES (NULL,'$_POST[nname]','$_POST[ncdes]','$data_file2')";
		$check=mysqli_query($conn,$sql1);
		if($check)
		{

		echo "<tr id='row123'>
		<td>123</td>
		<td>$_POST[nname]</td>
		<td>$data_file2</td>
		<td>$_POST[ncdes]</td>
		<td><button class='cdelete1 btn btn-danger' id='D'>Delete</button></td>
		<td><button class='btn btn-success' id='cedit1'>Edit</button></td>	
		</tr>";

		} 
		else 
		{
			echo 'Error in Insertion';
		}
	}
		?>

		<!DOCTYPE html>
<html>
<head>

	<title>Admin Panel</title>
	 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="../include/css1/common.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="../include/js1/primary1.js"></script>
</head>
<body>

	<br>
	<br>
			
		<form enctype='multipart/form-data' method='POST'  action='cinsertion.php' class='col-md-4' style='margin-left:30%;'>
				Category Name: <input type='text' class='form-control' id='cname' name='nname'><br>
				Image: <input type='file' class='form-control' id='icat_file' name='imgfile2'>
				Description: <input type='text' class='form-control' id='cdes' name='ncdes'><br>
				<input type='submit' class='form-control btn btn-primary' value='Add to Category List' name='csubmitname'>
		</form>

	</body>
	</html>
	</div>