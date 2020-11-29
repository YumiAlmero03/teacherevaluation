<!-- Modal -->
<div id="add_student" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-header">
</div>
<div class="modal-body">

</div>
 <center>
 <form class="form-horizontal" method="post"  enctype="multipart/form-data">
                                <legend><h4>Add Student</h4></legend>
                          
								
								<div class="control-group">
                                    <label class="control-label" for="inputEmail">Student ID/NO.:</label>
                                    <div class="controls">
                                        <input type="text" name="username"  placeholder="Student ID/NO." required>
                                    </div>
                                </div>
								
								 <div class="control-group">
                                <label class="control-label" for="inputPassword">Password</label>
                                <div class="controls">
                                    <input type="password" name="password" placeholder="Password" required>
                                </div>
                            </div>

								
								
								<div class="control-group">
                                    <label class="control-label" for="inputEmail">FullName:</label>
                                    <div class="controls">
                                        <input type="text" name="fname"  placeholder="FullName" required>
                                    </div>
                                </div>
								<div class="control-group">
                                    <label class="control-label" for="inputEmail">Course:</label>
                                    <div class="controls">
                                        <input type="text"  name="course"  placeholder="Course" required>
                                        <input type="hidden"  name="subject"  placeholder="Subject" value=" ">
                                    </div>
                                </div>
                                	<div class="control-group">
                                    <label class="control-label" for="inputEmail">Semester level:</label>
                                    <div class="controls">
                                             <select name="semester" required>

										   <?php
										    $semesters = array("1st","2nd","3rd");/*gumamit tayo dito ng array pra mas mapdali mapalabas ang dropdown menu bawat semester*/
										    $selectedSem = "";
										    foreach($semesters as $semester){
										    if(isset($_POST['submit']))
										    {
										      $selectedSem = ($_POST['semester'] == $semester) ? "selected" : "";
										    }
										    ?>
										      <option <?php echo $selectedSem; ?> value="<?php echo $semester; ?>"><?php echo $semester; ?> Semester</option>

										      
										    <?php 
										     }
										    ?>
                                               
										        </select> 
								       </div>
                                </div>
                                	<div class="control-group">
                                    <label class="control-label" for="inputEmail">Year level:</label>
                                    <div class="controls">
                                        <input type="text"  name="yl"  placeholder="Year level" required>
                                        <input type="hidden"  name="profname"  placeholder="Professor Name" value=" ">
                                    </div>
                                </div>
                             

                                <div class="control-group">
                                    <div class="controls">

                                        <button type="submit" name="update" class="btn btn-success"><i class="icon-save"></i>&nbsp;Save</button>
										<a href="home.php" class="btn btn-danger"><i class="icon-arrow-left"></i>&nbsp;Back</a>
                                    </div>
                                </div>
                            </form>

							 <?php 
								include 'connect.php';
								   if (isset($_POST['update'])) {

								    $fname = $_POST['fname'];
								    $course = $_POST['course'];
								     $subject= $_POST['subject'];
								    $semester = $_POST['semester'];
								     $yl = $_POST['yl'];
								    $username = $_POST['username'];
								     $password = $_POST['password'];
								    $profname = $_POST['profname'];
								    
								 
						   /*ibig sabihin nyang INSERT INTO  register -->ibig sabihin, ipapasok natin lahat ng nilagay mo na data sa field patungong database table */

						   /*at yung tawag don sa nag pa popup na form ay MODAL or lumilitaw kapg kini click muyong add Student*/
								    
								    
								        mysqli_query($con,"INSERT INTO  register (userID,fname,course,subject,semester,yl,username,password,profname)  VALUES ('','$fname','$course','$subject','$semester','$yl','$username','$password','$profname')") or die(mysqli_error($con));  
								            echo "<script type='text/javascript'>alert('Data Successfully Saved!');</script>";
								            echo "<script>window.location='student.php'</script>";   
								    


								?>  
								<?php } ?>	
															
							   
						
								</center>
								</center>

								
								</div>
								</div>