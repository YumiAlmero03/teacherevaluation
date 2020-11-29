<!-- Modal -->
<div id="evaladd" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-header">
</div>
<div class="modal-body">

</div>
 <center>
 <form class="form-horizontal" method="post"  enctype="multipart/form-data">
                                <legend><h4>Add Question</h4></legend>
                          
								<div class="control-group">
                                    <label class="control-label" for="inputEmail">Question:</label>
                                    <div class="controls">
                                        <input type="text" name="question"  placeholder="Question" required>
                                    </div>
                                </div>
								
                                	<div class="control-group">
                                    <label class="control-label" for="inputEmail">Category:</label>
                                    <div class="controls">
                                             <select name="category" required>

										   <?php
										   include 'connect.php';
										   $selectedSem = "";
										    $cat=mysqli_query($con,"select * from category")or die(mysqli_error($con));
										    while($category=mysqli_fetch_array($cat)){
										    if(isset($_POST['submit']))
										    {
										      $selectedSem = ($_POST['semester'] == $category['id']) ? "selected" : "";
										    }
										    ?>
										      <option <?php echo $selectedSem; ?> value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?> </option>

										      
										    <?php 
										     }
										    ?>
                                               
										        </select> 
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

								    $question = $_POST['question'];
								    $category = $_POST['category'];
								    
								 
						   /*ibig sabihin nyang INSERT INTO  register -->ibig sabihin, ipapasok natin lahat ng nilagay mo na data sa field patungong database table */

						   /*at yung tawag don sa nag pa popup na form ay MODAL or lumilitaw kapg kini click muyong add Student*/
								    
								    
								        mysqli_query($con,"INSERT INTO  questioner (question,category_id)  VALUES ('$question','$category')") or die(mysqli_error($con));  
								            echo "<script type='text/javascript'>alert('Data Successfully Saved!');</script>";
								            echo "<script>window.location='eval_edit.php'</script>";   
								    


								?>  
								<?php } ?>	
															
							   
						
								</center>
								</center>

								
								</div>
								</div>