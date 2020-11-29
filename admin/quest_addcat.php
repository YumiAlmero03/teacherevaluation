<?php 
include ('connect.php'); 
include ('header.php'); 
?>

<br><br>
<body bgcolor="#80d4ff">

            <div id="page-inner">
             <div class="row">
                    <div class="col-md- well" style=" margin-right:30%;margin-left:30%; box-shadow: 3px 4px 5px 2px; border-radius:8px;background-color:#cceeff">
                        <div class="hero-unit-table">   
                          <div class="hero-unit-table">   
                            <?php

                            $query = mysqli_query($con,"select * from category") or die(mysqli_error());
                            $row = mysqli_fetch_array($query);
                            while($row = mysqli_fetch_array($query))

								  {
                            ?>
                      
                            <form class="form-horizontal" method="post" enctype="multipart/form-data" >
                            
                                <div class="control-group">
                                    <label class="control-label" for="inputEmail">Category:</label>
                                    <div class="controls">
                                        <input type="text" name="category" value="<?php echo strip_tags($row['name']); ?>">
                                        <input type="hidden" name="id" value="<?php echo strip_tags($row['id']); ?>">
                                    </div>
                                </div>
                           
                     <br>

                                <div class="control-group">
                                    <div class="controls">

                                        <button type="submit" name="update" class="btn btn-success"><i class="icon-save icon-large"></i>&nbsp;Update</button>
                                        <button type="submit" name="delete" class="btn btn-error"><i class="icon-save icon-large"></i>&nbsp;Delete</button>
                                    </div>
                                </div>
                            </form>
                        <?php } ?> 
                                        <span><a href = "eval_edit.php" class = "btn btn-danger"> Back</a></span>

                            <?php
                            if (isset($_POST['update'])) {

                                $category = mysqli_real_escape_string($con,$_POST['category']);
                                $id = mysqli_real_escape_string($con,$_POST['id']);
                           
                                mysqli_query($con,"update category set name='$category' where id='$id'") or die(mysqli_error($con));
                     
                                echo "<script type='text/javascript'>alert('Successfully updated Student details!');</script>";
                                echo "<script>document.location='quest_addcat.php'</script>";
                            }
                            if (isset($_POST['delete'])) {
                                $id = mysqli_real_escape_string($con,$_POST['id']);

                                mysqli_query($con,"delete from category where id='$id'") or die(mysqli_error($con));
                                echo "<script type='text/javascript'>alert('Successfully remove Category!');</script>";
                                echo "<script>document.location='quest_addcat.php'</script>";

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
								