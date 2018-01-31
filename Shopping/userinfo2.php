<?php
		

	require_once 'include/db.php';

	if(isset($_POST['uname']))
	{

		$fetch="SELECT address,contact FROM shop WHERE firstname='$_POST[uname]'";
		$runfet=mysqli_query($conn,$fetch);
		$row=mysqli_fetch_assoc($runfet);

?>
	<div class='col-md-12' style='box-shadow: 0px 2px 4px 0 rgba(0,0,0,0.8);'><br><br>
	<b>Update Contact Details:</b><br><br>
	<div class="col-md-6">
		 Contact Number: <input type="text" class="form-control" id="iumobile" value="<?php echo $row['contact']; ?>"><br><br>	
		 Address: <textarea class="form-control" id="iuaddress"><?php echo $row['address']; ?></textarea><br>
		 <button class="btn btn-success col-md-6" id="updatecon" name="<?php echo $_POST['uname']; ?>">Update</button><br><br><br>
	</div>
   
</div>

<?php
	
	}


	if(isset($_POST['zname']))
	{

		$fetch="SELECT * FROM shop WHERE firstname='$_POST[zname]'";
		$runfet=mysqli_query($conn,$fetch);
		$row=mysqli_fetch_assoc($runfet);

?>
	<div class='col-md-12' style='box-shadow: 0px 2px 4px 0 rgba(0,0,0,0.8);'><br><br>
	<b>Personal Information:</b><br><br>
	<div class="col-md-6">
		 First Name: <input type="text" class="form-control" id="ifname" value="<?php echo $row['firstname']; ?>" disabled><br><br>	
		 Last Name: <input type="text" class="form-control" id="ilname" value="<?php echo $row['lastname']; ?>"><br><br>
		 Email ID: <input type="text" class="form-control" id="iemail" value="<?php echo $row['emailid']; ?>"><br><br>
		 Password:  <input type="text" class="form-control" id="ipass" value="<?php echo $row['password']; ?>"><br><br>
		 <button class="btn btn-success col-md-6" id="updatepro" name="<?php echo $_POST['zname']; ?>">Update</button><br><br><br>
	</div>
	<div class="col-md-6">
		<center><img src="img/<?php echo $row['pro_image']; ?>" height="250px" width="250px"></center>
	</div>
   
</div>

<?php } ?>