<?php

	require_once 'include/db.php';
	require_once 'include/nav.php';
	/*echo "<script>alert($_SESSION[user]);</script>";
*/




	$getuser="SELECT * FROM shop WHERE firstname='$_SESSION[user]'";
	$runget=mysqli_query($conn,$getuser);

	$row=mysqli_fetch_assoc($runget);


	
?>


<div class="row">
	<div class="col-md-3" >
		<div class="col-md-12 panel-body" style="box-shadow: 0px 2px 4px 0 rgba(0,0,0,0.8); margin: 10px;">
			<h2><center>Hello, <?php echo $row['firstname']; ?></center></h2>
			<hr>
			<button class="btn btn-default col-md-12" id="userprofile" name="<?php echo $_SESSION['user']; ?>">My Profile</button><br><br><br>
			<button class="btn btn-default col-md-12" id="usercontact" name="<?php echo $_SESSION['user']; ?>">Contact Details</button><br><br><br>
			<a class="btn btn-warning col-md-12" href="logout.php">Log out</a>


		</div>
	</div>

	<div class="col-md-9"  style="margin-top: 10px; ">
		<div class="col-md-12" id="infodiv">
		</div>
	</div>
</div>


<?php
	


	require_once 'include/footer.php';
?>