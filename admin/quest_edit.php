<?php 
include ('connect.php'); 
include ('header.php'); 
$userID=mysqli_real_escape_string($con,$_GET['id']);
?>

<br><br>
<body bgcolor="#80d4ff">

            <div id="page-inner">
             <div class="row">
                    <div class="col-md- well" style=" margin-right:30%;margin-left:30%; box-shadow: 3px 4px 5px 2px; border-radius:8px;background-color:#cceeff">
                        <div class="hero-unit-table">   
                          <div class="hero-unit-table">   
                            <?php

                            $query = mysqli_query($con,"select * from questioner where id='$userID'") or die(mysqli_error());
                            $row = mysqli_fetch_array($query);
                            ?>
                      
                            <form class="form-horizontal" method="post" enctype="multipart/form-data" >
                                <div class="alert alert-info"><strong>Edit Question</strong> </div>
                            
                                <div class="control-group">
                                    <label class="control-label" for="inputEmail">Question</label>
                                    <div class="controls">
                                        <textarea rows="10" name="question" id="inputEmail" class = "form-control"><?php echo strip_tags($row['question']); ?></textarea>
                                    </div>
                                </div>
                               <div class="control-group">
                                    <label class="control-label" for="inputEmail">Category:</label>
                                    <div class="controls">
                                             <select name="category" required>

                                           <?php
                                           $selectedSem = "";
                                            $cat=mysqli_query($con,"select * from category")or die(mysqli_error($con));
                                            while($category=mysqli_fetch_array($cat)){
                                              $selectedSem = ($row['category_id'] == $category['id']) ? "selected" : "";
                                           
                                            ?>
                                              <option <?php echo $selectedSem; ?> value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?> </option>

                                              
                                            <?php 
                                             }
                                            ?>
                                               
                                                </select> 
                                       </div>
                           
                     <br>

                                <div class="control-group">
                                    <div class="controls">

                                        <button type="submit" name="update" class="btn btn-success"><i class="icon-save icon-large"></i>&nbsp;Update</button>
                                        <span><a href = "eval_edit.php" class = "btn btn-danger"> Back</a></span>
                                    </div>
                                </div>
                            </form>

                            <?php
                            if (isset($_POST['update'])) {


                                $question = mysqli_real_escape_string($con,$_POST['question']);
                                $category = mysqli_real_escape_string($con,$_POST['category']);

                             

                                mysqli_query($con,"update questioner set question='$question',category_id='$category' where id='$userID'") or die(mysqli_error($con));
                     
                                echo "<script type='text/javascript'>alert('Successfully updated Student details!');</script>";
                                echo "<script>document.location='eval_edit.php'</script>";
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
								