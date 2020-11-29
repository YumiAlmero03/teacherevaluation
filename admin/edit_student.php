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

                            $query = mysqli_query($con,"select * from register where userID='$userID'") or die(mysqli_error());
                            $row = mysqli_fetch_array($query);
                           $nel = htmlentities($row['userID']);
                            ?>
                      
                            <form class="form-horizontal" method="post" enctype="multipart/form-data" >
                                <div class="alert alert-info"><strong>Edit Student</strong> </div>
                            
                                 <div class="control-group">
                                    <label class="control-label" for="inputEmail">userID</label>
                                    <div class="controls">
                                        <input type="text" name="userID" id="inputEmail" class = "form-control" value="<?php echo $nel; ?>" disabled = "disabled">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="inputEmail">FullName</label>
                                    <div class="controls">
                                        <input type="text" name="fname" id="inputEmail" class = "form-control" value="<?php echo strip_tags($row['fname']); ?>">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="inputEmail">Course</label>
                                    <div class="controls">
                                        <input type="text" name="course" id="inputEmail" class = "form-control" value="<?php echo strip_tags($row['course']); ?>">
                                        <input type="hidden" name="subject" id="inputEmail" class = "form-control" value="<?php echo strip_tags($row['subject']); ?>">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="inputPassword">Semester</label>
                                    <div class="controls">
                                        <input type="text"  name="semester"  class = "form-control" value="<?php echo strip_tags($row['semester']); ?>">
                                    </div>
                                </div>
                                  <div class="control-group">
                                    <label class="control-label" for="inputPassword">Year level</label>
                                    <div class="controls">
                                        <input type="text"  name="yl"  class = "form-control" value="<?php echo strip_tags($row['yl']); ?>">
                                    </div>
                                </div>
                                  <div class="control-group">
                                    <label class="control-label" for="inputPassword">Username</label>
                                    <div class="controls">
                                        <input type="text"  name="username"  class = "form-control" value="<?php echo strip_tags($row['username']); ?>">
                                    </div>
                                </div>
                                 <div class="control-group">
                                    <label class="control-label" for="inputPassword">Password</label>
                                    <div class="controls">
                                        <input type="text"  name="password"  class = "form-control" value="<?php echo strip_tags($row['password']); ?>">
                                        <input type="hidden"  name="profname"  class = "form-control" value="<?php echo strip_tags($row['profname']); ?>">
                                    </div>
                                </div>
                               
                           
                     <br>

                                <div class="control-group">
                                    <div class="controls">

                                        <button type="submit" name="update" class="btn btn-success"><i class="icon-save icon-large"></i>&nbsp;Update</button>
                                        <span><a href = "student.php" class = "btn btn-danger"> Back</a></span>
                                    </div>
                                </div>
                            </form>

                            <?php
                            if (isset($_POST['update'])) {


                                $fname = mysqli_real_escape_string($con,$_POST['fname']);
                                $course = mysqli_real_escape_string($con,$_POST['course']);
                                $subject = mysqli_real_escape_string($con,$_POST['subject']);
                                $semester = mysqli_real_escape_string($con,$_POST['semester']);
                                $yl = mysqli_real_escape_string($con,$_POST['yl']);
                                $username = mysqli_real_escape_string($con,$_POST['username']);
                                $password = mysqli_real_escape_string($con,$_POST['password']);
                                 $profname = mysqli_real_escape_string($con,$_POST['profname']);

                             

                                mysqli_query($con,"update register set fname='$fname',course='$course',subject='$subject',semester='$semester',yl='$yl',username='$username', password='$password', profname='$profname' where userID='$userID'") or die(mysqli_query());
                     
                                echo "<script type='text/javascript'>alert('Successfully updated Student details!');</script>";
                                echo "<script>document.location='student.php'</script>";
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
								