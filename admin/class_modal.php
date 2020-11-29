<!-- Modal -->
<div id="add_student" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-header">
</div>
<div class="modal-body">

</div>
 <center>
 <form class="form-horizontal" method="post"  enctype="multipart/form-data">
                                <legend><h4>Add Class</h4></legend>
								<div class="control-group">
                                    <label class="control-label" for="inputEmail">Name:</label>
                                    <div class="controls">
                                        <input type="text" name="name"  placeholder="Class Name" required>
                                    </div>
                                </div>
								<div class="control-group">
                                    <label class="control-label" for="inputEmail">Code:</label>
                                    <div class="controls">
                                        <input type="text"  name="code"  placeholder="Class Code" required>
                                    </div>
                                </div>
                                	<div class="control-group">
                                    <label class="control-label" for="inputEmail">Professor:</label>
                                    <div class="controls">
                                             <select name="prof" required>
                                             	<option disabled >Select Faculty</option>
										   <?php
											include 'connect.php';
										   $result= mysqli_query($con,"select * from professors order by id ASC" ) or die (mysql_error());
										    while ($row= mysqli_fetch_array($result)){
										    
										    ?>
										      <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>

										      
										    <?php 
										     }
										    ?>
                                               
										        </select> 
								       </div>
                                </div>
                                	<div class="control-group">
                                    <label class="control-label" for="inputEmail">Time:</label>
                                    <div class="controls">
                                        <input type="time"  name="time"  placeholder="Class Time" required>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="inputEmail">Day:</label>
                                    <div class="controls">
                                        <input type="text"  name="day"  placeholder="Class Day" required>
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
								   if (isset($_POST['update'])) {

								    $name = $_POST['name'];
								    $code = $_POST['code'];
								     $prof= $_POST['prof'];
								    $time = $_POST['time'];
								     $day = $_POST['day'];
								    
								 
						   /*ibig sabihin nyang INSERT INTO  register -->ibig sabihin, ipapasok natin lahat ng nilagay mo na data sa field patungong database table */

						   /*at yung tawag don sa nag pa popup na form ay MODAL or lumilitaw kapg kini click muyong add Student*/
								    
								    
								        mysqli_query($con,"INSERT INTO  class (name,class_code,prof_id,time,day)  VALUES ('$name','$code','$prof','$time','$day')") or die(mysqli_error($con));  
								            echo "<script type='text/javascript'>alert('Data Successfully Saved!');</script>";
								            echo "<script>window.location='class.php'</script>";   
								    


								?>  
								<?php } ?>	
															
							   
						
								</center>
								</center>

								
								</div>
								</div>