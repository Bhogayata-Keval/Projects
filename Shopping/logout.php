<?php
		
	session_start();
	session_unset($_SESSION['user']);
	session_destroy();
	echo "<script>window.location='index.php'</script>";
?>