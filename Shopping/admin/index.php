<?php

	require_once '../include/db.php';
	require_once '../include/nav.php';


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
	      

	
<?php
	require_once '../include/footer.php';
?>


