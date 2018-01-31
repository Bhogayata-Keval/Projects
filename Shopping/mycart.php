<?php
	require_once 'include/db.php';
	require_once 'include/nav.php';	
?>

<div class="col-md-12" style="margin-bottom:100px;" id="showhere">
<?php

    $select1="SELECT `pid` FROM `cart` WHERE `uname`='$_SESSION[user]'"; 
 	$select2="SELECT * FROM `product` WHERE `pid` IN ($select1)"; 
	$runselect2=mysqli_query($conn,$select2);
	$serial1=1;
	echo "
			<table class='table'>			
			<thead>
			<tr height='70px'>
			<th>No</th>
			<th>Product Name</th>
			<th>Product Image</th>
			<th>Description</th>			
			<th>Category</th>
			<th>Price(Rs.)</th>
			<th>Quantity</th>
			<th>Total</th>
			</tr>";	
			
	while($row=mysqli_fetch_assoc($runselect2))
	{	
			
				echo "	
				<tr height='75px' id='row$row[pid]'>
				<td>$serial1</td>
				<td>$row[pname]</td>
				<td><img src='../pimg/$row[pimage]' height='50px' width='50px' alt='not available'></td>
				<td>$row[pdes]</td>
				<td>$row[category]</td>
				<td id='price$row[pid]'>$row[price]</td>
				<td><input type='text' class='form-control calculate2 qquantity' name='$row[pid]' style='width:100px;' value='1'></td>
				<td id='totalamt$row[pid]' class='ttotal' name='$row[pid]'>$row[price]</td>
				<td><a class='btn btn-danger cartdelete' id='$row[pid]'>Remove</a></td>
				</tr>";
				$serial1++;
	}
	echo "</thead></tbody>";
?>
	
	<br><br>
	<div id="grandtotal" name="<?php echo $sum; ?>">
	</div>
	<a class="btn btn-success col-md-3" id="checkout" name="hello">Check Out</a>
</div> 
	
<?php
	
	if(isset($_POST['goid']))
	{
		$cinsert="INSERT INTO cart (`pid`,`uname`) VALUES ('$_POST[goid]','$_SESSION[user]')";
		$runinsert=mysqli_query($conn,$cinsert); 
	}

?>

		
	

<!-- <script src="../include/js1/jquerysession.js"></script> -->

<script>


$(document).ready(function(){
	var ans=0;
	 $(document).on('click', '.cartdelete', function(e){
    e.preventDefault();
    var el=this;
    var jsid2=$(this).attr('id');
    jQuery.ajax({
      url: '../admin/main.php',
      type: 'POST',
      data: ( {del_id2:jsid2} ),
      success: function(data){
        $(el).closest('tr').fadeOut(10,function(){
          $(this).remove();   
        });
       // $(#abc).load();
      }
    }); 
  });

 $('.calculate2').keyup(function(){
   
    var get1=$(this).attr('name');
    var abc='#price'+get1;
  //  alert(abc);
    var x=$('#price'+get1).html();
  //  alert(x);
    var y=$(this).val();
   // alert(y);
    var z=x*y;
   // alert(z);
    $('#totalamt'+get1).text(z);
  });

 $('.qquantity').keyup(function(){

 	var sum=0;
 	$('.qquantity').each(function(){
 		var quanname=$(this).attr('name');
 		var extra1=$(this).val();
   	 	var extra2=$('#price'+quanname).html();
    	var extra3=extra1*extra2;
        sum=parseInt(sum)+parseInt(extra3);
 	});

 	ans=sum;
 
  });
	
 $(document).on('click', '#checkout', function(e){
    e.preventDefault();
    var ans1=ans;
    jQuery.ajax({
 		url: '../checkout.php',
 		type: 'POST',
 		data: { sum1:ans1 },
 		success: function(data){
 			alert(data);
 			/*alert(sum1);*/
 			window.location='checkout.php';
 		}
 	});
   });
});

</script>

<!-- $(document).ready(function(){
		 var abc=$.session.get('id1');
		 alert(abc);
       jQuery.ajax({
          url: 'forcart.php',
          type: 'POST',
          data: { goid2:abc },
          success: function(data){
          $('#showhere').append(data);
    }
  });
}); -->

<?php
	
	require_once 'include/footer.php';
?>