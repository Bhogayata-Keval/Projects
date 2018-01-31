<?php


	require_once 'include/db.php';

	if(isset($_POST['catch2']))
	{
	
	$data1=$_POST['catch2'];

	$runshow=mysqli_query($conn,"SELECT * FROM product WHERE category='$data1'");
	// echo $show1="SELECT category FROM product WHERE category IN '$data1'";
	 //$runshow=mysqli_query($conn,$show1);
	/* if(!$runshow)
	 {
	 	echo "<script>alert('No');</script>";
	 }
	 else
	 {*/
		

		while($row1=mysqli_fetch_assoc($runshow))
		{
			
			?>
			<div class="col-md-3" style="margin-bottom:100px;" id="toremove">
				<div class="col-md-12" style="box-shadow: 0px 1px 2px 0 rgba(0,0,0,0.8);">
					<br><br>
			<img src="pimg/<?php echo $row1['pimage']; ?>" class="images img-responsive" alt="not available">
			<h3>
			<?php
				echo $row1['pname'];
			?>			
		</h3>
			<table class="table">
        		<tr>
        			<th style="text-align: right;">Price:</th>
        			<td >
        				<div id="price<?php echo $row1['pid']; ?>"><?php echo $row1['price']; ?></div></td>
        		</tr>
        		
        	</table>
			<br><br>
			<button class="btn btn-primary col-md-6 mcart" id="<?php echo $row1['pid']; ?>">Add to Cart</button>
			<br><br><br>
		</div>
		</div>
<?php

  } }



  if(isset($_POST['catch4']))
  {
  		$querycat='SELECT * FROM product';
		$runcat=mysqli_query($conn,$querycat);
		while($row=mysqli_fetch_assoc($runcat))
		{

	?>
	
		<div class="col-md-3" style="margin-bottom:100px;" id="toremove">
		<div class="col-md-12" style="box-shadow: 0px 1px 2px 0 rgba(0,0,0,0.8);">
			<br><br>
			<img src="pimg/<?php echo $row['pimage']; ?>" class="images img-responsive" alt="not available">
			<h3>
			<?php
				echo $row['pname'];
			?>			
		</h3>

			<table class="table">
        		<tr>
        			<th style="text-align: right;">Price:</th>
        			<td >
        				<div id="price<?php echo $row['pid']; ?>"><?php echo $row['price']; ?></div></td>
        		</tr>
        
        	</table>
			<br><br>
			<button class="btn btn-primary col-md-6 mcart" id="<?php echo $row['pid']; ?>">Add to Cart</button>
				<br><br><br>
		</div>
	</div>

	<?php 
		} 
  }


  ?>