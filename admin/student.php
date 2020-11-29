<?php include ('connect.php');
 session_start();
if(empty($_SESSION['userID'])):
header('Location:index.php');
endif;
?>

 ?>
<?php include ('header.php'); ?>
<body>
<?php include ('menunav.php');?>


<div class="container">
<div class="hero-unit-header">
 <div class="container-con">
   <div class="row-fluid">
      <div class ="span12">
   <br><br><br>
      </div>
    </div>
	<!-- end banner & menunav -->
	<div class="container">
<div class="row-fluid">
<div class="span12">
<div class="hero-unit-3">
<legend><h3>Student's List</h3></legend>

<a href="#add_student" data-toggle="modal" class="btn btn-inverse"><i class="icon-plus-sign"></i>&nbsp;Add Student</a>
<br>
<br>
<!--- table -->

					<table style="width:1129px;" class="table table-bordered table-hover" id="example">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Full Name</th>
                                        <th>Course</th>
                                        <th>Semester</th>
                                        <th>Year Level</th>
                                        <th>Username</th>
                                        <th>Password</th>
                                         <th>Action</th>
                                     
                                 
                                    </tr>
                                </thead>
                                <tbody>

                                     <?php
                                        include'connect.php';

                                        /*select * from register order by userID ASC-->ibig sabihin nito ay Pinipili nya lahat mula sa register na table order by userID ito ay ID at ang ASC -- ASCENDING or Sorting FROM A-Z kapg DESC ibig sabhn sorting Z-A*/
                              
                                     $result= mysqli_query($con,"select * from register order by userID ASC" ) or die (mysql_error());
                                      while ($row= mysqli_fetch_array($result)){
                                      $userID = htmlentities($row['userID']);
                                                                          
                                        ?>
                                                   <tr>
                                            <td><?php echo htmlentities($row['userID']); ?></td> <!--nilalabas nya lang ang laman ng buong table nasa database-->
                                            <td><?php echo htmlentities($row['fname']); ?></td> 
                                            <td><?php echo htmlentities($row['course']); ?></td> 
                                            
                                            <td><?php echo htmlentities($row['semester']); ?></td>                                       
                                            <td><?php echo htmlentities($row['yl']); ?></td> 
                                             <td><?php echo htmlentities($row['username']); ?></td> 
                                             <td><?php echo htmlentities($row['password']); ?></td> 
                                             <!--end ng laman paglabas ng data sa table -->
                                             
                                             <td width="180px"><a href="edit_student.php <?php echo '?userID='. $userID; ?>" class="btn btn-info"><i class="icon-pencil icon-large"></i>&nbsp; Edit </a>
                                             
                                               <a href="#deletemember<?php echo $row['userID']; ?>" data-toggle="modal" class="btn btn-danger btn-sm"><i class="icon-trash icon-large"></i>&nbsp;Delete</a>
                                             <?php include('delete_members_modal.php'); ?>
                                             </td>

                                          
                                       

                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div> 
	
	<!-- end table -->
	
	

</div>
</div>
</div>
<?php include ('footer.php'); ?>
</div>
</div>
</div>
</div>
<?php include('student_modal.php'); ?>
<?php include('modal.php'); ?>
</body>
</html>
	
	
	
	



