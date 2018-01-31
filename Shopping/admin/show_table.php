<?php

	
require_once '../include/db.php';	
	//require_once 'nav.php';

?>



<?php

	if(isset($_POST['show_table']))
	{
		$userial=1;
		$qret="SELECT * FROM `shop`"; 
		$runret=mysqli_query($conn,$qret);
			echo "
			<table class='table'>			
			<thead>
			<tr>
			<th>No</th>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Email ID</th>
			<th>Password</th>
			<th>Address</th>
			<th>Contact</th>
			<th>Image</th>
			</tr>
			</thead>
			<tbody id='tbody1'>";		
			while($rows = mysqli_fetch_assoc($runret))
			{

				echo "<tr height='75px'>
				<td>$userial</td>
				<td>$rows[firstname]</td>
				<td>$rows[lastname]</td>
				<td>$rows[emailid]</td>
				<td>$rows[password]</td>
				<td>$rows[address]</td>
				<td>$rows[contact]</td>
				<td><img src='../img/$rows[pro_image]' width='50px' height='50px' alt='not available'></td>
				</tr>";	
				$userial++;
			}
			echo "</tbody></table>";
	}

?>


