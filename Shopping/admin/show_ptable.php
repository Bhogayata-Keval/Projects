<?php
	require_once '../include/db.php';	
?>


<?php

	if(isset($_POST['show_ptable']))
	{
		echo "
		<div class='col-md-6'>
			<input type='text' name='searchbox' id='isearch' placeholder='Search by Product Name' class='form-control col-md-12' style='width: 50%;';>
		</div>
		<div class='col-md-6'>
			<a class='btn btn-primary col-md-4' id='addpro' style='float:right; margin-right:100px;'><span class='glyphicon glyphicon-plus'></span>&nbsp;&nbsp;Add Product</a>
		</div>";
	}


	if(isset($_POST['cshow_ptable']))
	{
		echo "
		<div class='col-md-6'>
			<input type='text' name='searchbox' id='icsearch' placeholder='Search by Category Name' class='form-control col-md-12' style='width: 50%;';>
		</div>
		<div class='col-md-6'>
			<a class='btn btn-primary col-md-4' id='addcat' style='float:right; margin-right:100px;'><span class='glyphicon glyphicon-plus'></span>&nbsp;&nbsp;Add Category</a>
		</div>";
	}


	if(isset($_POST['get2']))
	{
		$qret="SELECT * FROM `product` WHERE `pname` LIKE '%".$_POST['get2']."%'"; 
		$runret=mysqli_query($conn,$qret);
		if($runret)
		{
			$serial1=1;
			echo "
			<table id='fortable3' class='table'>			
			<thead>
			<tr height='70px'>
			<th>No</th>
			<th>Product Name</th>
			<th>Product Image</th>
			<th>Description</th>
			<th>Quantity</th>
			<th>Price(Rs.)</th>
			<th>Category</th>
			</tr>
			</thead>
			<tbody id='tbody1'>";		
			while($rows = mysqli_fetch_assoc($runret))
			{
				
				echo "	
				<tr id='row$rows[pid]' height='75px'>
				<td>$serial1</td>
				<td>$rows[pname]</td>
				<td><img src='../pimg/$rows[pimage]' height='50px' width='50px' alt='not available'></td>
				<td>$rows[pdes]</td>
				<td>$rows[pquantity]</td>
				<td>$rows[price]</td>
				<td>";
		
					$category1="SELECT c_name FROM category WHERE c_name='$rows[category]'";
					$runcat1=mysqli_query($conn,$category1);
					if(mysqli_num_rows($runcat1))
					{
						echo $rows['category'];
					}
					else
					{

						$checkcategory="UPDATE product SET category='Uncategorized' WHERE category='$rows[category]'";
						$runcc=mysqli_query($conn,$checkcategory);
						echo 'Uncategorized';
					}
					

				echo "</td>
				<td><button class='delete1 btn btn-danger' id='$rows[pid]'>Delete</button></td>
			    <td><button class='btn btn-success' id='edit1' name='$rows[pid]'>Edit</button></td>
				</tr>";
				$serial1++;
			}
			echo "</tbody></table>";
		}
	}

	if(isset($_POST['cget2']))
	{
		$qret="SELECT * FROM `category` WHERE `c_name` LIKE '%".$_POST['cget2']."%'"; 
		$runret=mysqli_query($conn,$qret);
		if($runret)
		{
			$serial2=1;
			echo "
			<table id='fortable3' class='table'>			
			<thead>
			<tr height='70px'>
			<th>No</th>
			<th>Category Name</th>
			<th>Category Image</th>
			<th>Description</th>
			</tr>
			</thead>
			<tbody id='tbody1'>";		
			while($rows = mysqli_fetch_assoc($runret))
			{
				echo "	
				<tr id='crow$rows[c_id]' height='75px'>
				<td>$serial2</td>
				<td>$rows[c_name]</td>
				<td><img src='../cimg/$rows[c_img]' height='50px' width='50px' alt='not available'></td>
				<td>$rows[c_des]</td>
				<td><button class='cdelete1 btn btn-danger' id='$rows[c_id]'>Delete</button></td>
			    <td><button class='btn btn-success' id='cedit1' name='$rows[c_id]'>Edit</button></td>
				</tr>";
				$serial2++;
			}
			echo "</tbody></table>";
		}
	}

?>

