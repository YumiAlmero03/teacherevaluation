<?php 
include('connect.php'); 
include ('header.php'); 

session_start();
if(empty($_SESSION['userID'])):
header('Location:index.php');
endif;
?>
<body>

<div class="row-fluid">
<div class="span12">

<?php include ('menunav.php');?>
<br><br><br>
 
<!--- notif --> 
<div class="container">
<div class="row-fluid">



     <div class="col-md-9">
            <!-- Website Overview -->
            <div class="panel panel-default">
              <div class="panel-heading main-color-bg">
                <h3 class="panel-title"><i class="icon-dashboard"></i>&nbsp;<a href="home.php">Dashboard</a></h3><hr>

              </div>
              <div class="row">
          <?php   
                                        /*Itong part na ito ay binibilang nya yung laman ng buong table kung ilan lahat nasa loob*/ 
                                    include 'connect.php';                                
                                        $query1=mysqli_query($con,"select COUNT(*) as userID from register")or die(mysqli_error($con));
                                       $row2=mysqli_fetch_array($query1)

               
                                    ?>           <div class="panel-body">
                <div class="span2" style="margin-right:5%;margin-left:23%;">
                  <div class="well dash-box" style="background-color:#b3fff0">
                    <h2><a href="student.php"><i class="icon-user icon-large"></i>&nbsp;<font color="red"><?php echo $row2['userID'];?></font> </h2></a>
                    <h4>Student list</h4>
                  </div>
                  </div>
                  </div>
  
                 <div class="row">
                         <?php   
                                        /*Itong part na ito ay binibilang nya yung laman ng buong table kung ilan lahat nasa loob*/ 
                                    include 'connect.php';                                
                                        $query1=mysqli_query($con,"select COUNT(*) as log_id from history_log")or die(mysqli_error($con));
                                       $row2=mysqli_fetch_array($query1)

               
                                    ?>  
              <div class="panel-body">
                <div class="span2" style="margin-right:5%;">
                  <div class="well dash-box" style="background-color:#ffffb3">
                    <h2><a href="student_log.php"><i class="icon-time icon-large"></i>&nbsp;<font color="red"><?php echo $row2['log_id'];?></font></h2></a>
                    <h4>Logged history</h4>
                  </div>
                  </div>
                </div>
                
     

                 <div class="row">
                  <?php   
                                     /*Itong part na ito ay binibilang nya yung laman ng buong table kung ilan lahat nasa loob*/ 

                                    include 'connect.php';                                
                                        $query1=mysqli_query($con,"select COUNT(*) as id_teacher from details")or die(mysqli_error($con));
                                       $row2=mysqli_fetch_array($query1)

               
                                    ?> 
                <div class="span2">
                  <div class="well dash-box" style="background-color:#c2c2f0">
                   <h2><a href="eval_result.php"><i class="icon-list icon-large"></i>&nbsp;<font color="red"><?php echo $row2['id_teacher'];?></font></h2></a>
                    <h4>Eval.Result</h4>
                  </div>
                </div>
                </div><hr>
               <br><center>
                <marquee behavior="alternate"><img src="../images/arellano 2nd.png"><img src="../images/Arellano 1st.png"><img src="../images/arellano 3rd.png"></marquee> <!--ito yung image na gumagalaw na nakikita nyo sa dashboard*/




  </div>
  </div>
  
 <!--end--> 
 
<?php include ('footer.php'); ?>
 
  </div>
  </div>
 

</div>
</div>

</div>




<?php include('modal.php'); ?>  



</body>
</html>

