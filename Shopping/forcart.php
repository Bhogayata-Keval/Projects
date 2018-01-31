<?php
	require_once '../include/db.php';
?>






<?php
	$away=$_POST['goid2'];
	 $fetch="SELECT * FROM `product` WHERE `pid`='$away'";

	$runfet=mysqli_query($conn,$fetch);
	$row=mysqli_fetch_assoc($runfet);

		//echo "Kunal saro chhe";
		echo "
		<div class='col-md-12' >

			<img src='../pimg/$row[pimage]' class='images img-responsive' alt='not available'>
			<h3>
				$row[pname]			
		</h3>

			<br><br>
		
		</div>";

?>
<?php
?>