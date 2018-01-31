<?php

	require_once '../include/db.php';
?>





<?php


		if(isset($_POST['setadminout']))
		{
			session_unset($_SESSION['admin']);
			session_destroy();
			header('location: admin.php');
		}


	
	if(isset($_POST['pcname1']))
	{
			
		$sql1="INSERT INTO `category` (`c_id`,`c_name`,`c_img`,`c_des`) VALUES (NULL,'$_POST[pcname1]','SET','$_POST[pdes]')";
		$check=mysqli_query($conn,$sql1);
		if($check)
		{

		echo "<tr id='row123'>
		<td>123</td>
		<td>$_POST[pcname1]</td>
		<td><img src='../pimg/wood.jpg' height='50px' width='50px' alt='not available'></td>
		<td>$_POST[pdes]</td>
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
  <script src="../include/js1/jquerysession.js"></script>
</head>
<body>

<?php
	if(isset($_SESSION['admin'])){

		
?>

	<br>
	<br>
	
	<form method="POST">
				<div class="col-md-3">
						<a class="btn btn-default col-md-12" id="admin_user"><span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;Users</a>
				</div>

				<div class="col-md-3">
						<a class="btn btn-default col-md-12" id="admin_cat"><span class="glyphicon glyphicon-duplicate"></span>&nbsp;&nbsp;Categories</a>
				</div>

				<div class="col-md-3">
						<a class="btn btn-default col-md-12" id="admin_product"><span class="glyphicon glyphicon-shopping-cart"></span>&nbsp;&nbsp;Products</a>
				</div>

				<div class="col-md-3">
		
						<input type="submit" class="btn btn-warning col-md-12" name="setadminout" value="Log out">
				</div>
				<br><br><hr>
	</form>		

			<div style='width: 100%;'>
			
				<div class="col-md-12">
						
				<table id="fortable" class="col-md-12">
					
				</table>
				<div id="fortable2" class="col-md-12">
					
				</div>
			</div>	
			<div class="col-md-12">
				 <table id="fordiv" class="col-md-12">

				</table>
			</div>	
		</div>


<?php
//	require_once 'footer.php';
}else{	

	

	if(isset($_POST['setadmin']))
	{
		$aname=$_POST['setaname'];
		$apass=$_POST['setapass'];
		$checkadmin="SELECT adminname from shopadmin WHERE adminname='$aname' AND adminpass='$apass'";
		$runcheck=mysqli_query($conn,$checkadmin);
		if(mysqli_num_rows($runcheck))
		{
			$_SESSION['admin']=$aname;
			echo "<script>window.location='admin.php';</script>";
		}
		else
		{
			echo "<script>alert('Invalid Credentials!');</script>";
		}
	}
?>

	 <div class="container col-md-4" style='margin-left: 30%;'>
	        	<h1>Login to Admin Panel</h1>
	        	<br>
	        	<br>
	        	<form method="POST" enctype="multipart/form-data">

				<div class="form-group">
				<b>Admin Name:</b> <input type="text" class="form-control" name="setaname">
				<br>
				<b>Password:</b> <input type="password" class="form-control" name="setapass">
				<br>
				<input type="submit" class="btn btn-primary col-md-4" value="Login as Admin" name="setadmin" id="iregister">
				</div>
				</form>
			</div>


	
<?php } ?>


		</body>
</html>