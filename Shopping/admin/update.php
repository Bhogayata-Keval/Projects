	<?php

		require_once '../include/db.php';

		if(isset($_POST['edit_set']))
		{
			$edit_name=$_POST['edit_name'];
			$edit_des=$_POST['edit_des'];
			//$edit_quan=$_POST['edit_quan'];
			$edit_price=$_POST['edit_price'];
			$edit_category=$_POST['edit_category'];
			

		  $qedit2="UPDATE product SET pname='$edit_name', pdes='$edit_des', price='$edit_price', category='$edit_category' WHERE pid='$_POST[edit_set]'";
			if(mysqli_query($conn,$qedit2))
			{
				echo "<td>$_POST[edit_set]</td>
				<td>$edit_name</td>
				<td><img src='../wood.jpg' height='50px' width='50px' alt='not available'></td>
				<td>$edit_des</td>
				<td>$edit_price</td>
				<td>$edit_category</td>
				<td><button class='delete1 btn btn-danger' id='$_POST[edit_set]'>Delete</button></td>
	    		<td><button class='$_POST[edit_set] btn btn-success' id='edit1'>Edit</button></td>";
			}
			else{
				echo 'ERR'; 			
			}
		}


		if(isset($_POST['cedit_set']))
		{
			$edit_name=$_POST['edit_name'];
			$edit_des=$_POST['edit_des'];

			
		  $qedit2="UPDATE category SET c_name='$edit_name',c_des='$edit_des' WHERE c_id='$_POST[cedit_set]'";
			if(mysqli_query($conn,$qedit2))
			{
				echo "<td>$_POST[cedit_set]</td>
				<td>$edit_name</td>
				<td><img src='../wood.jpg' height='50px' width='50px' alt='not available'></td>
				<td>$edit_des</td>
				<td><button class='cdelete1 btn btn-danger' id='$_POST[cedit_set]'>Delete</button></td>
	    		<td><button class='$_POST[cedit_set] btn btn-success' id='cedit1'>Edit</button></td>";
			}
			else{
				echo 'ERR'; 			
			}
		}


		if(isset($_POST['edit_id']))
		{ 


			$qedit="SELECT * FROM product WHERE pid='$_POST[edit_id]'";
			$runedit=mysqli_query($conn,$qedit);
			if(!($runedit))
			{
				echo 'Error 1';
			}
			else
			{
				while($erow=mysqli_fetch_assoc($runedit))
				{
					$eid=$erow['pid'];
					$ename=$erow['pname'];
					$eimage=$erow['pimage'];
					$edes=$erow['pdes'];
					$equan=$erow['pquantity'];
					$eprice=$erow['price'];
					$ecategory=$erow['category'];
				}	

				?>
				<div>
				<form>
					Product Name: <input type='text' class='form-control' id='newname' value='<?php echo $ename; ?>'><br>
					Decsription: <input type='text' class='form-control' id='ipdes' value='<?php echo $edes; ?>'>
		
					Price(Rs.): <input type='text' class='form-control' id='ipprice' value='<?php echo $eprice; ?>'><br>
					Category:<select id='ipcategory' class='form-control'>
					<option value='Uncategorized'>Uncategorized</option>
					<?php
						$fetch='SELECT * FROM category';
						$runfet=mysqli_query($conn,$fetch);
						while($rows=mysqli_fetch_assoc($runfet))
						{
							?>
							<option value='<?php echo $rows['c_name']; ?>'   <?php if($ecategory=="$rows[c_name]") { echo 'selected="selected"'; } ?>      ><?php echo $rows['c_name']; ?></option>
							<?php
						}
					?>
				</select> <br>
					<input type='submit' class='form-control btn btn-primary' id='isubmit2' name='<?php echo $eid; ?>' value='Edit'>
				</form>
				</div>

					<?php
					// <input type='text' class='form-control' id='ipcategory' value='<?php echo $ecategory; '>
			}
		}		


		if(isset($_POST['cedit_id']))
		{ 


			$qedit="SELECT * FROM category WHERE c_id='$_POST[cedit_id]'";
			$runedit=mysqli_query($conn,$qedit);
			if(!($runedit))
			{
				echo 'Error 1';
			}
			else
			{
				while($erow=mysqli_fetch_assoc($runedit))
				{
					$eid=$erow['c_id'];
					$ename=$erow['c_name'];
					$eimage=$erow['c_img'];
					$ecat=$erow['c_des'];
				}	

				?>
				<div>
				<form>
					Category Name: <input type='text' class='form-control' id='cname' value='<?php echo $ename; ?>'><br>
					Description: <input type='text' class='form-control' id='cdes' value='<?php echo $ecat; ?>'><br>
					<input type='submit' class='form-control btn btn-primary' id='icsubmit2' name='<?php echo $eid; ?>' value='Edit'>
				</form>
				</div>

					<?php

			}
		}		
	?>