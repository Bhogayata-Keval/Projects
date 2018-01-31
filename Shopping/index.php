<?php

	require_once 'include/nav.php';


	if(isset($_POST['setregister']))
	{

	    $email=$_POST['setemail'];
	    
	    $checkque="SELECT `firstname` FROM `shop` WHERE `emailid`='$email'";
		$run=mysqli_query($conn,$checkque);
		if(!mysqli_num_rows($run))
		{

			$file_temp=$_FILES['setfile']['tmp_name'];
			$file_name=$_FILES['setfile']['name'];
			$data_file=$_POST['setfirstname'].'_'.$file_name;
			$path='img/'.$data_file;
			move_uploaded_file($file_temp, $path);

			$firstname=$_POST['setfirstname'];
			$lastname=$_POST['setlastname'];
			$emailid=$_POST['setemail'];
			$password=$_POST['setpassword'];

			$insque="INSERT INTO `shop` (`firstname`,`lastname`,`emailid`,`password`,`pro_image`) VALUES ('$firstname','$lastname','$emailid','$password','$data_file')";
			$runins=mysqli_query($conn,$insque);
		}
		else
		{
			echo "<script>alert('BYE BYE 3');</script>";
			$warning1="User already exists with given Email ID";
		}
	}


	if(isset($_POST['setlogin']))
	{
		$name=$_REQUEST['setlname'];
		$pass=$_REQUEST['setlpass'];
		$logque="SELECT `firstname` FROM `shop` WHERE firstname='$name' AND password='$pass'";
		$runlog=mysqli_query($conn,$logque);
		if(mysqli_num_rows($runlog))
		{
			$_SESSION['user']=$name;
		}
		else
		{

		}
	}
	
?>


<nav class="navbar navbar-default navbar-fixed-top">
	<div class="container-fluid">
    	<div class="navbar-header">
      		<a class="navbar-brand" href="#">ShopCafe</a>
    	</div>
    	<ul class="nav navbar-nav">
      		<li class="active"><a href="#">Products</a></li>
      		<?php if(isset($_SESSION['user'])){ ?>
      		<li><a href="userinfo.php" id="<?php echo $_SESSION[user]; ?>"><?php echo $_SESSION['user']; ?></a></li>
	      	<li><a name="setlogout" href="logout.php">Logout</a></li>
	      	<li><a name="setcart" href="cart/mycart.php">My Cart</a></li>
      		<?php }else{ ?>
	        <li><a data-target="#mylogin" data-toggle="modal">Login</a></li>
	      	<li><a data-target="#myregister" data-toggle="modal">Register</a></li>
	      	<li><a href="guestcart.php" name="setcart1">Guest Cart</a></li>
	      	<?php } ?>
    	</ul>
  	</div>
</nav>
  
<div class="modal fade" id="mylogin" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Login</h4>
        </div>

        <div class="modal-body" style="padding: 50px;">
        	<form method="POST">

			<div class="form-group">
			<b>User Name:</b> <input type="text" class="form-control" name="setlname" id="ilname" autofocus>
			<br><br>
			<b>Password:</b> <input type="password" class="form-control" name="setlpass" id="ilpass">
			<br>
			<input type="submit" class="btn btn-primary col-md-4" value="Login" name="setlogin" id="ilogin">
			</div>
			</form>
        </div>

       
      </div>
      
    </div>
  </div>
  
</div>


	<div class="modal fade" id="myregister" role="dialog">
	    <div class="modal-dialog">
	    
	      <!-- Modal content-->
	      <div class="modal-content">
	        <div class="modal-header">
	          <button type="button" class="close" data-dismiss="modal">&times;</button>
	          <h4 class="modal-title">Create New Account</h4>
	        </div>

	        <div class="modal-body" style="padding: 50px;">
	        	<?php if(isset($warning1)){ ?>
	        	<div class="alert alert-danger" role="alert">
	        		<?php echo $warning1; ?>
	        	</div>
	        	<?php } ?>
	        	<form method="POST" enctype="multipart/form-data">

				<div class="form-group">
				<b>First Name:</b> <input type="text" class="form-control" name="setfirstname">
				<br>
				<b>Last Name:</b> <input type="text" class="form-control" name="setlastname">
				<br>
				<b>Email ID:</b> <input type="text" class="form-control" name="setemail">
				<br>
				<b>Password:</b> <input type="password" class="form-control" name="setpassword">
				<br>
				<b>Picture:</b> <input type="file" class="form-control" name="setfile">
				
				<br>
				<input type="submit" class="btn btn-primary col-md-4" value="Register" name="setregister" id="iregister">
				</div>
				</form>
	        </div>

	       
	      </div>
	      
	    </div>
	  </div>
	  
	</div>



<div class="modal fade" id="myproduct" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Product Information</h4>
        </div>

        <div class="modal-body" style="padding: 50px;">
        	<center><img src="wood.jpg" class="images" height="200px" width="400px" alt="not available"></center>
        	<br><br>
        	<table class="table">
        		<tr>
        			<th style="text-align: right;">Price:</th>
        			<td></td>
        		</tr>
        		<tr>
        			<th style="text-align: right;">Quantity:</th>
        			<td><input type="number" placeholder=""></td>
        		</tr>
        		<tr>
        			<th style="text-align: right;">Total:</th>
        			<td></td>
        		</tr>
        	</table>

        	<button class="btn btn-primary" style="float:right;">Add to Cart</button>
        </div>

       
      </div>
      
    </div>
  </div>
  
</div>

<div class="container-fluid">
  <div class="jumbotron" style='margin-top:120px;'>


  	<?php if(isset($_SESSION['user'])){ ?>
	      		<h1><center>Welcome&nbsp;<?php echo $_SESSION['user']; ?></center></h1>
      		<?php }else{ ?>
				<h1><center>Welcome</center></h1>	      
	      	<?php } ?>
  </div>     
</div>

<div class="container-fluid">
	<div class="container">
		<div class="row">
	<h1><center>Categories</center></h1>
	<hr>
	

	<?php 

		$querycat='SELECT * FROM category';
		$runcat=mysqli_query($conn,$querycat);
		while($row=mysqli_fetch_assoc($runcat))
		{
	?>

	<div class="col-md-3" style='margin-bottom:100px'>
		<div class="col-md-12" style="box-shadow: 0px 1px 2px 0 rgba(0,0,0,0.8);" class="hover1">
			<br><br>
			<img src="cimg/<?php echo $row['c_img']; ?>" class="images img-responsive" alt="not available">
			<h3><center>
			<?php
				echo $row['c_name'];
			?></center>			
		</h3>
			<br><br>
		</div>
	</div>

	<?php } ?>

</div>
</div>
	<hr>
</div>




<div class="container-fluid">
	<div class="container">
		<div class="row">
	<h1><center>Products</center></h1>

	
	<?php 

		$querycat='SELECT * FROM category';
		$runcat=mysqli_query($conn,$querycat);
		?>
		<input type="radio" value="<?php echo 'All'; ?>" class="ifilter" name="nfilter[]" id="iall" checked>&nbsp;&nbsp;<?php echo 'All'; ?>&nbsp;&nbsp;&nbsp;&nbsp;
		<?php
		while($row=mysqli_fetch_assoc($runcat))
		{
	?>
		<input type="radio" value="<?php echo $row['c_name']?>" class="ifilter" name="nfilter[]">&nbsp;&nbsp;<?php echo $row['c_name']?>&nbsp;&nbsp;&nbsp;&nbsp;
	<?php } ?>

		
	<hr>
	<?php 

		$querycat='SELECT * FROM product';
		$runcat=mysqli_query($conn,$querycat);
		?>
		<div id="filterresult1">
			<?php
		while($row=mysqli_fetch_assoc($runcat))
		{
	?>
	
		<div class="col-md-3" style="margin-bottom:100px;" id="toremove">
		<div class="col-md-12" style="box-shadow: 0px 1px 2px 0 rgba(0,0,0,0.8);" class="hover1">
			<br><br>
			<img src="pimg/<?php echo $row['pimage']; ?>" class="images img-responsive" alt="not available">
			
			<h3>
			<center>
			<?php

			// <button class="btn btn-primary col-md-6 mcart" id="<?php echo $row['pid']; 
				echo $row['pname'];
			?></center>			
		</h3>

			<table class="table">
        		<tr>
        			<th style="text-align: right;">Price:</th>
        			<td >
        				<div id="price<?php echo $row['pid']; ?>"><?php echo $row['price']; ?></div></td>
        		</tr>

        	</table>
			<br>
			<?php 
				if(isset($_SESSION['user']))
				{
					$cartcheck="SELECT * from cart where pid='$row[pid]' && uname='$_SESSION[user]'";
					$runcart=mysqli_query($conn,$cartcheck);
					if(mysqli_num_rows($runcart))
					{
						echo "<button class='btn btn-danger col-md-6 col-sm-6 mcart' id='$row[pid]'>Added to Cart</button>";
					}
					else
					{
						echo "<button class='btn btn-primary col-md-6 col-sm-6 mcart' id='$row[pid]'>Add to Cart</button>";	
					}
			    }
			    else
				{
					echo "<button class='btn btn-primary col-md-6 mcart' id='$row[pid]'>Add to Cart</button>";	
				}
			 ?>
			<br><br><br>
		</div>
	</div>


	<?php } ?>
	</div>
</div>
</div>
</div>




<?php
	require_once 'include/footer.php';
?>