<?php
	require_once 'include/db.php';
	require_once 'include/nav.php';

	if(isset($_POST['sum1']))
	{
		 $abc=$_POST['sum1'];	
		 echo $abc;
	}
	else
	{
		echo "NONONO";
	}
	
    
?>



<br><br>
<div>
	<table class="table col-md-4">
		
	</table>
</div>

<?php
	require_once 'include/footer.php';
?>