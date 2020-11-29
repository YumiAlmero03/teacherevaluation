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
<legend>Edit Evaluation <a href="#evaladd" data-toggle="modal" class="btn btn-primary btn-sm"><i class="icon-plus icon-large"></i>&nbsp;Add Question</a> <a href="quest_addcat.php" class="btn btn-primary btn-sm"></i>&nbsp;Category</a></legend>


      <table style="width:1129px;" class="table table-bordered table-hover" id="example">
           <thead>
		     <tr>
			     <th>Question</th>
			     <th>Category</th>
			     <th>Action</th>			      
		     </tr>
           </thead>
		   <tbody>
								<?php
								 include ('connect.php');

								$result3 = mysqli_query($con,"SELECT * FROM questioner order by id DESC");
								
								
								while($row3 = mysqli_fetch_array($result3))

								  {
								 $id_teacher =	$row3['id'];

								  if($row3['question'] != "")
								  {
								  ?>
								 <tr>
									
									<td> <?php echo $row3['question']; ?> </td>
									<td> <?php
    $catID = $row3['category_id'];
    $cat=mysqli_query($con,"select * from category where id='$catID' limit 1")or die(mysqli_error($con));
    while($catname=mysqli_fetch_array($cat)){
    echo $catname['name'];
}
      ?>  </td>
									<td>
                                             <a href="quest_edit.php?id=<?php echo $row3['id']; ?>" data-toggle="modal" class="btn btn-primary btn-sm"><i class="icon-pencil icon-large"></i>&nbsp;Edit</a> <a href="#evaldelete<?php echo $row3['id']; ?>" data-toggle="modal" class="btn btn-danger btn-sm"><i class="icon-trash icon-large"></i>&nbsp;Delete</a>
                                             <?php include('quest_delete_modal.php'); ?>
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
<?php include('quest_add_modal.php'); ?>
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