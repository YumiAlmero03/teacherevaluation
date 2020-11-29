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
<legend>Teacher's Evaluation</legend>


      <table style="width:1129px;" class="table table-bordered table-hover" id="example">
           <thead>
		     <tr>
			     <th>FullName</th>
			     <th>Teacher</th>
			      <th>subject</th>
			      <th>semester</th>
			      <th>Year</th>
			     <th>Comment from Student's</th> 
                  <th>rater</th>
			     <th>Date</th>
			     <th>Action</th>
		     </tr>
           </thead>
		   <tbody>

			   
								
							

								<?php
								 include ('connect.php');

								$result3 = mysqli_query($con,"SELECT * FROM details order by id_teacher DESC");
								
								
								while($row3 = mysqli_fetch_array($result3))

								  {
								 $id_teacher =	$row3['id_teacher'];

								  if($row3['comment'] != "")
								  {
								  ?>
								 <tr>
									
									<td> <?php echo $row3['fname']; ?> </td>
									<td> <?php echo $row3['teacher']; ?> </td>
									<td> <?php echo $row3['subject']; ?> </td>
									<td> <?php echo $row3['semester']; ?> </td>
									<td> <?php echo $row3['sy']; ?> </td>
									<td> <?php echo $row3['comment']; ?> </td>
									<td> <?php echo $row3['rater']; ?> </td>
									<td> <?php echo $row3['date']; ?> </td>
									<td> <a href="#evaldelete<?php echo $row3['id_teacher']; ?>" data-toggle="modal" class="btn btn-danger btn-sm"><i class="icon-trash icon-large"></i>&nbsp;Delete</a>
                                             <?php include('eval_delete_modal.php'); ?>
                                             </td>
									
									
									
								 </tr>
							<?php
								}
							}
			  
			  ?>	   
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