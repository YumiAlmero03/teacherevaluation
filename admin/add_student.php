<?php include ('dbcon.php'); ?>
<?php include ('header.php'); ?>
<?php include ('session.php'); ?>
<body>


<?php include ('menunav.php')?>
<div class="container">
<div class="hero-unit-header">
 <div class="container-con">
   <div class="row-fluid">
      <div class ="span12">
   
                    <div class="row-fluid">
                         <div class="span12">
                           <img src="images/banner.png">
						 </div>
                    </div>
      </div>
    </div>
<!-- end banner & menunav -->

<div class="container">
<div class="row-fluid">
<div class="span12">
<div class="row-fluid">
<div class="span3"></div>
<div class="span6">


<div class="hero-unit-3">
<center>
  <form class="form-vertical" method="post"  enctype="multipart/form-data">
                                <legend><h4>Add Student account</h4></legend>
                                
								<div class="control-group">
                                    <label class="control-label" for="inputEmail">ID Number:</label>
                                    <div class="controls">
                                        <input type="text" name="id_number"  placeholder="ID no." required>
                                    </div>
                                </div>
                                   <div class="control-group">
                                    <label class="control-label" for="inputPassword">Program:</label>
                                    <div class="controls">
									     
										 <select type="text" name="program" required>
                                            <option></option>
											<option>BSIS</option>
											<option>BSHRM</option>
											<option>BSCE</option>
											<option>BSIT</option>
											
										
											
										 </select>
										 
                                       
                                    </div>
                                </div>
								<div class="control-group">
                                    <label class="control-label" for="inputemail">Year:</label>
                                    <div class="controls">
                                        <select type="text" name="yr" required>
											<option></option>
											<option>1st</option>
											<option>2nd</option>
											<option>3rd</option>
											<option>4th</option>
											
										
											
										 </select>
                                    </div>
                                </div>
								<div class="control-group">
                                    <label class="control-label" for="inputemail">Status:</label>
                                    <div class="controls">
                                       <select type="text" name="status" required>
											<option></option>
											<option>Evaluated</option>
											<option>Non-evaluated</option>
											
											
										
											
										 </select>
                                    </div>
                                </div>
								
								
                                <div class="control-group">
                                    <div class="controls">

                                        <button type="submit" name="update" class="btn btn-success"><i class="icon-save"></i>&nbsp;Save</button>
										<a href="student.php" class="btn"><i class="icon-arrow-left"></i>&nbsp;Back</a>
                                    </div>
                                </div>
                            </form>
							
							
							<?php
                            if (isset($_POST['update'])) {

                                $id_number = $_POST['id_number']; 
                                $program= $_POST['program']; 
                                $yr= $_POST['yr']; 
                                $status= $_POST['status']; 
									
						mysql_query("insert into student (id_number,program,status,yr) values('$id_number','$program','$status','$yr')")or die(mysql_error());
						header("location:student.php");

					
								}
								?></center>
								</center>

								
								</div>
								</div>
								</div>
								</div>
								</div>
								<?php include ('footer.php'); ?>
								</div>
								</div>
								</div>
								</div>
								<?php include('modal.php'); ?>	
														
</body>
</html>
								