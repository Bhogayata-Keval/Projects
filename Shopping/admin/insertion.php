<?php
//  <input type='text' class='form-control' id='ipcategory'><br>

	require_once '../include/db.php';
	


	if(isset($_POST['submitname']) )
	{
		
		echo "<script>alert('PHP PHP');</script>";

		echo $file_name1=$_FILES['imgfile1']['name'];

		echo "<script>alert($file_name1);</script>";
		$file_temp1=$_FILES['imgfile1']['tmp_name'];
		echo "<script>alert($file_name1);</script>";
		$data_file1=$_POST['nnewname'].'_'.$file_name1;
		$path1='../pimg/'.$data_file1;
		move_uploaded_file($file_temp1, $path1);	
			
		$sql1="INSERT INTO `product` (`pid`,`pname`,`pimage`,`pdes`,`pquantity`,`price`,`category`) VALUES (NULL,'$_POST[nnewname]','$data_file1','$_POST[npdes]','$_POST[npquan]','$_POST[nprice]','$_POST[npcategory]')";
		$check=mysqli_query($conn,$sql1);
		if($check)
		{

		echo "<tr id='row123'>
		<td>123</td>
		<td>$_POST[nnewname]</td>
		<td>$data_file1</td>
		<td>$_POST[npquan]</td>
		<td>$_POST[nprice]</td>
		<td>$_POST[npcategory]</td>
		<td><button class='delete1 btn btn-danger' id='D'>Delete</button></td>
		<td><button class='btn btn-success' id='edit1'>Edit</button></td>	
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
			<form enctype='multipart/form-data' method='POST' id='insertimg' action='insertion.php' class='col-md-4' style='margin-left:30%;'>
				Product Name: <input type='text' class='form-control' id='newname' name='nnewname'><br>
				Image: <input type='file' class='form-control' id='ipro_file' name='imgfile1'>
				Decsription: <input type='text' class='form-control' id='ipdes' name='npdes'>
				Quantity: <input type='number' class='form-control' id='ipquan' name='npquan'>
				Price(Rs.): <input type='text' class='form-control' id='ipprice' name='nprice'><br>
				Category:
				<select id='ipcategory' class='form-control' name='npcategory'>
					<option value='Uncategorized'>Uncategorized</option>
					<?php
						$fetch='SELECT * FROM category';
						$runfet=mysqli_query($conn,$fetch);
						while($rows=mysqli_fetch_assoc($runfet))
						{
							?>
							<option value='<?php echo $rows['c_name']; ?>'><?php echo $rows['c_name']; ?></option>
							<?php
						}
					?>
				</select><br>
				<input type='submit' class='form-control btn btn-primary'  value='Add to Product List' name='submitname'>
		</form>
		</div>

	</body>
	</html>
	