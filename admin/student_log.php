<?php
session_start();
if(empty($_SESSION['userID'])):
header('Location:index.php');
endif;
?>

 ?>
<?php include ('header.php'); ?>

<body>
<?php include ('menunav.php'); ?>
<div class="container">
<div class="hero-unit-header">
 <br><br><br>
<!--- body -->
<div class="container">
<div class="row-fluid">
<div class="span12">

  	
<div class="span12">
   <div class="hero-unit-3">
<legend>Login history</legend>


      <table style="width:1129px;" class="table table-bordered table-hover" id="example">
 <thead>
								<tr><th>Student ID/NO.</th>
									<th>Fullname</th>
									<th>Activity</th>																
								</tr>
							 </thead>
							 <tbody>
									<?php	
									include 'connect.php';

									/*natural join kung baga yung table na history_log at register pinagcombine lang natin ang ibang laman na part nila* dapat gagamit ka dito ng foreign key bukod sa primary key*/	

										$query1=mysqli_query($con,"select * from history_log NATURAL JOIN register ORDER BY log_id DESC")or die(mysqli_error($con));
										while ($row=mysqli_fetch_array($query1)){
											$id=$row['userID'];										
									?>  
								<tr>
									<td><?php echo $row['username'];?></td>
									<td><?php echo $row['fname'];?></td>
									<td><?php echo $row['action']. " ".date("F d, Y - - h:i A", strtotime($row['date'])); ?></td>															
								</tr>
										
								<?php }?>
										</tbody>
									</table>
            
	
             	
</div>	
</div>	
	
	
	
	
	
	
	
</div>	
</div>

<?php include ('footer.php'); ?>	
</div>	
	

</div>
</div>
</div>
</div>
</div>
<?php include('modal.php'); ?>
</body>
</html>