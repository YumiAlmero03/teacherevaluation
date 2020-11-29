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

                            $query = mysqli_query($con,"select * from class where id='$userID'") or die(mysqli_error());
                            $row = mysqli_fetch_array($query);
                           $nel = htmlentities($row['id']);
                            ?>
                      
                            <form class="form-horizontal" method="post" enctype="multipart/form-data" >
                                <div class="alert alert-info"><strong>Edit Class</strong> </div>
                            
                                 <div class="control-group">
                                    <label class="control-label" for="inputEmail">ID</label>
                                    <div class="controls">
                                        <input type="text" name="userID" id="inputEmail" class = "form-control" value="<?php echo $nel; ?>" disabled = "disabled">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="inputEmail">Name</label>
                                    <div class="controls">
                                        <input type="text" name="name" id="inputEmail" class = "form-control" value="<?php echo strip_tags($row['name']); ?>">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="inputEmail">Code</label>
                                    <div class="controls">
                                        <input type="text" name="code" id="inputEmail" class = "form-control" value="<?php echo strip_tags($row['class_code']); ?>">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="inputEmail">Professor</label>
                                    <div class="controls">
                                        <select name="prof" required>
                                           
                                               <?php
                                           $result= mysqli_query($con,"select * from professors order by id ASC" ) or die (mysqli_error());
                                            while ($row2= mysqli_fetch_array($result)){
                                            $select = ($row['prof_id'] === $row2['id']) ? "" : "selected";
                                            ?>

                                              <option <?php echo $select; ?> value="<?php echo $row2['id']; ?>"><?php echo $row2['name']; ?></option>

                                              
                                            <?php 
                                             }
                                            ?>
                                                </select> 
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="inputEmail">Time</label>
                                    <div class="controls">
                                        <input type="time" name="time" id="inputEmail" class = "form-control" value="<?php echo strip_tags($row['time']); ?>">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="inputEmail">Day</label>
                                    <div class="controls">
                                        <input type="text" name="day" id="inputEmail" class = "form-control" value="<?php echo strip_tags($row['day']); ?>">
                                    </div>
                                </div>
                      <br>

                                <div class="control-group">
                                    <div class="controls">

                                        <button type="submit" name="update" class="btn btn-success"><i class="icon-save icon-large"></i>&nbsp;Update</button>
                                        <span><a href = "class.php" class = "btn btn-danger"> Back</a></span>
                                    </div>
                                </div>
                            </form>
                     <br>
                     <div class="alert alert-info"><strong>Students</strong> </div>
                     <form class="form-horizontal" method="post" enctype="multipart/form-data" >
                         <div class="control-group">
                                    <label class="control-label" for="inputEmail">Add Student</label>
                                    <div class="controls">
                                        <select name="student" required>
                                           <?php
                                           $resultS= mysqli_query($con,"select * from register" ) or die (mysqli_error());
                                            while ($rowS= mysqli_fetch_array($resultS)){
                                            ?>
                                              <option value="<?php echo $rowS['userID']; ?>"><?php echo $rowS['fname']; ?></option>

                                            <?php 
                                             }
                                            ?>
                                               
                                        </select> 
                                        <button type="submit" name="add" class="btn btn-success"><i class="icon-plus icon-large"></i>&nbsp;Add</button>
                                    </div>
                                </div>
                     </form>
                        <div class="control-group">
                                    <div class="controls">
                                        <table class="table table-bordered table-hover" id="example" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Course</th>
                                                    <th>Remove</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                    $resultC= mysqli_query($con,"select * from class_student WHERE class_id=".$userID ) or die (mysql_error());
                                                    while ($rowC= mysqli_fetch_array($resultC)){
                                                ?>
                                                <tr>
                                                    <td><?php 
                                                          $studid = $rowC['student_id'];
                                                          $queryStud = mysqli_query($con,"select * from register where userID=$studid") or die(mysqli_error());
                                                          $rowStud = mysqli_fetch_array($queryStud);
                                                          echo htmlentities($rowStud['fname']);
                                                     ?></td>
                                                    <td><?php echo htmlentities($rowStud['course']); ?></td>
                                                    <td>
                                                        <form class="form-horizontal" method="post" enctype="multipart/form-data">
                                                            <input type="hidden" name="id" value="<?php echo $rowC['id'] ?>">
                                                            <button type="submit" name="delete" class="btn btn-danger"><i class="icon-trash icon-large"></i>&nbsp;Remove</button>
                                                        </form>
                                                    </td>
                                                </tr> 
                                                <?php 
                                                 }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            <?php
                            if (isset($_POST['update'])) {


                                $fname = mysqli_real_escape_string($con,$_POST['name']);
                                $course = mysqli_real_escape_string($con,$_POST['code']);
                                $prof_id = mysqli_real_escape_string($con,$_POST['prof']);
                                $time = mysqli_real_escape_string($con,$_POST['time']);
                                $day = mysqli_real_escape_string($con,$_POST['day']);
                             

                                mysqli_query($con,"update class set name='$fname',class_code='$course',prof_id='$prof_id',time='$time',day='$day' where id='$userID'") or die(mysqli_query());
                     
                                echo "<script type='text/javascript'>alert('Successfully updated Student details!');</script>";
                                echo "<script>document.location='class.php'</script>";
                            }
                            if (isset($_POST['add'])) {

                                $stud = $_POST['student'];
                                $class = $_GET['userID'];
                             
                                mysqli_query($con,"INSERT INTO class_student (student_id,class_id) VALUES ($stud,$class)") or die(mysqli_error($con));  
                                echo "<script type='text/javascript'>alert('Successfully updated Student details!');</script>";
                                echo "<script>document.location='edit_class.php ?userID=".$class."'</script>";
                            }
                            if (isset($_POST['delete'])) {

                                $id = $_POST['id'];
                             
                                mysqli_query($con,"delete from class_student where id=".$id) or die(mysqli_error($con));  
                                echo "<script type='text/javascript'>alert('Successfully updated Student details!');</script>";
                                echo "<script>document.location='edit_class.php ?userID=".$userID."'</script>";
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
								