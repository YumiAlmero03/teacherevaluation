<?php 
include ('connect.php'); 
include ('header.php'); 
$userID=mysqli_real_escape_string($con,$_GET['userID']);
?>

<br><br>
<body bgcolor="#80d4ff">

            <div id="page-inner">
             <div class="row">
                    <div class="col-md- well" style=" margin-right:30%;margin-left:30%; box-shadow: 3px 4px 5px 2px; border-radius:8px;background-color:#cceeff">
                        <div class="hero-unit-table">   
                          <div class="hero-unit-table">   
                            <?php

                            $query = mysqli_query($con,"select * from professors where id='$userID'") or die(mysqli_error());
                            $row = mysqli_fetch_array($query);
                           $nel = htmlentities($row['id']);
                            ?>
                      
                            <form class="form-horizontal" method="post" enctype="multipart/form-data" >
                                <div class="alert alert-info"><strong>Edit Faculty</strong> </div>
                            
                                 <div class="control-group">
                                    <label class="control-label" for="inputEmail">ID</label>
                                    <div class="controls">
                                        <input type="text" name="userID" id="inputEmail" class = "form-control" value="<?php echo $nel; ?>" disabled = "disabled">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="inputEmail">FullName</label>
                                    <div class="controls">
                                        <input type="text" name="fname" id="inputEmail" class = "form-control" value="<?php echo strip_tags($row['name']); ?>">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="inputEmail">Department</label>
                                    <div class="controls">
                                        <input type="text" name="course" id="inputEmail" class = "form-control" value="<?php echo strip_tags($row['department']); ?>">
                                        <input type="hidden" name="subject" id="inputEmail" class = "form-control" value="<?php echo strip_tags($row['subject']); ?>">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="inputEmail">Email</label>
                                    <div class="controls">
                                        <input type="text" name="mail" id="inputEmail" class = "form-control" value="<?php echo strip_tags($row['email']); ?>">
                                    </div>
                                </div>
                     <br>

                                <div class="control-group">
                                    <div class="controls">

                                        <button type="submit" name="update" class="btn btn-success"><i class="icon-save icon-large"></i>&nbsp;Update</button>
                                        <span><a href = "faculty.php" class = "btn btn-danger"> Back</a></span>
                                    </div>
                                </div>
                            </form>

                            <?php
                            if (isset($_POST['update'])) {


                                $fname = mysqli_real_escape_string($con,$_POST['fname']);
                                $course = mysqli_real_escape_string($con,$_POST['course']);
                                $mail = mysqli_real_escape_string($con,$_POST['mail']);
                             

                                mysqli_query($con,"update professors set name='$fname',department='$course',email='$mail' where id='$userID'") or die(mysqli_query());
                     
                                echo "<script type='text/javascript'>alert('Successfully updated Student details!');</script>";
                                echo "<script>document.location='faculty.php'</script>";
                            }
                            ?>


                        </div>
                     
                
                
                </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>

</body>
</html>
								