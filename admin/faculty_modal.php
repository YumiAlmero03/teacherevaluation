<!-- Modal -->
<div id="add_student" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-header">
</div>
<div class="modal-body">

</div>
 <center>
 <form class="form-horizontal" method="post"  enctype="multipart/form-data">
                                <legend><h4>Add Faculty</h4></legend>
                          
								<div class="control-group">
                                    <label class="control-label" for="inputEmail">FullName:</label>
                                    <div class="controls">
                                        <input type="text" name="fname"  placeholder="FullName" required>
                                    </div>
                                </div>
								<div class="control-group">
                                    <label class="control-label" for="inputEmail">Department:</label>
                                    <div class="controls">
                                        <input type="text"  name="department"  placeholder="Department" required>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="inputEmail">Email:</label>
                                    <div class="controls">
                                        <input type="text"  name="mail"  placeholder="Email Address" required>
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
								    $course = $_POST['department'];
								    $mail = $_POST['mail'];
								    
								 
						   /*ibig sabihin nyang INSERT INTO  register -->ibig sabihin, ipapasok natin lahat ng nilagay mo na data sa field patungong database table */

						   /*at yung tawag don sa nag pa popup na form ay MODAL or lumilitaw kapg kini click muyong add Student*/
								    
								    
								        mysqli_query($con,"INSERT INTO  professors (name,department,email)  VALUES ('$fname','$course','$mail')") or die(mysqli_error($con));  
								            echo "<script type='text/javascript'>alert('Data Successfully Saved!');</script>";
								            echo "<script>window.location='faculty.php'</script>";   
								    


								?>  
								<?php } ?>	
															
							   
						
								</center>
								</center>

								
								</div>
								</div>