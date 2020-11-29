
<?php
include('header.php');
?>

<body>
<div class="container">
<div class="row-fluid">
<div class="span12">
       <?php

      $con = mysqli_connect('localhost', 'root', '', 'teacher_evaluation');
      /*echo "Connected successful!";*/
      if(mysqli_connect_errno()){
        echo "failed to connect database" .mysqli_connect_errno();
      }
   //session_start();

   $userID = $_SESSION['StudentID']; /*kaya may session dito para malaman natin sino yung naglogin na magkakaiba ng account or sarili nyang account lang makikita nya*/

   $query=mysqli_query($con,"select * from register where userID = '$userID'")or die(mysqli_error($con));
    while($row=mysqli_fetch_array($query)){

    ?>
<div class="navbar navbar-fixed-top navbar-inverse">

  <div class="navbar-inner">
      <ul class="nav navbar-nav" style="padding-top: 1%">
        <li><span style="color: gray;font-size: 1.1em;" id="tick2" class="timeh1"></li><!--saktong Time top gray-->
          <li>&nbsp;&nbsp; <?php
                            date_default_timezone_set("Asia/Manila");
                            $date = new DateTime();
                            echo $date->format('l, F jS, Y'); /*saktong date*/
                           // echo $date->format('Y-m-d');
                            
                          ?></li>
    </ul>
    <ul class="nav navbar-nav navbar-right" style="margin-left:50%;">
     
      <li><a href="logout.php">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff9999"><b><?php echo $row['username'];?></b></font>&nbsp;&nbsp;<i class="icon-signout icon-large"></i>&nbsp;<b>Logout</b></a></li>
    </ul>
</div>
</div>
 <?php }   ?> 

<!--content-->
             <div class="container">
<b><br><br>
<!--end-->
  <!--functions-->          
<div id="content">    
 
        
    <!--endfunctions-->

<div class="row-fluid">
  <div class="span12">
    <div class="hero-unit" style="background-color:#ffffe6">
      <legend><h4 style="margin-left:350px;">Classes</h4></legend>
        <table style="width:1129px;" class="table table-bordered table-hover" id="example">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Code</th>
                                        <th>Professor</th>
                                        <th>Time</th>
                                        <th>Day</th>
                                        <th>Action</th>               
                                    </tr>
                                </thead>
                                <tbody>

                                     <?php
                              
                                     $resultCS= mysqli_query($con,"select * from class_student  where student_id=".$userID ) or die (mysql_error());
                                      while ($CS= mysqli_fetch_array($resultCS)){
                                      $classID = htmlentities($CS['class_id']);
                                      $classQ = mysqli_query($con,"select * from class where id='$classID'") or die(mysqli_error());
                                      $class = mysqli_fetch_array($classQ);
                                      $userQ = mysqli_query($con,"select * from register where userID = '$userID'") or die(mysqli_error());
                                      $user = mysqli_fetch_array($userQ);
                                        ?>
                                                   <tr>
                                            <td><?php echo htmlentities($CS['id']); ?></td> <!--nilalabas nya lang ang laman ng buong table nasa database-->
                                            <td><?php echo htmlentities($class['name']); ?></td> 
                                            <td><?php echo htmlentities($class['class_code']); ?></td> 
                                            <td><?php 
                                              $profid = $class['prof_id'];
                                              $profQ = mysqli_query($con,"select name from professors where id='$profid'") or die(mysqli_error());
                                              $prof = mysqli_fetch_array($profQ);
                                              echo htmlentities($prof['name']);
                                             ?></td> 
                                             <!--end ng laman paglabas ng data sa table -->
                                            <td><?php echo date('g:i a', strtotime($class['time'])); ?></td> 
                                            <td><?php echo htmlentities($class['day']); ?></td> 
                                             
                                             <td width="180px">

                                              <?php
                                              $query = "SELECT id_teacher FROM details WHERE (teacherid='".$profid."' AND studentid='".$userID."' AND sy='".date("Y")."' AND semester='".$user['semester']."' )"; 
                                              $result = mysqli_query($con,$query) or die(mysqli_error($con));
                                              if(mysqli_fetch_array($result) > 0)
                                                  echo "Evaluted";
                                              else
                                                  echo "<a href='evaluation.php?classid=".$class['id']."' class='btn btn-info'><i class='icon-pencil icon-large'></i>&nbsp; Evaluate </a>";
                                              ?>
                                              
                                             </td>

                                          
                                       

                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
    </div>
   </div>    
 </div>
<!---end table2-->
</div>
</div>
</div>
<script src="js/jquery.js"></script>
    <script src="js/bootstrap-transition.js"></script>
    <script src="js/bootstrap-alert.js"></script>
    <script src="js/bootstrap-modal.js"></script>
    <script src="js/bootstrap-dropdown.js"></script>
    <script src="js/bootstrap-scrollspy.js"></script>
    <script src="js/bootstrap-tab.js"></script>
    <script src="js/bootstrap-tooltip.js"></script>
    <script src="js/bootstrap-popover.js"></script>
    <script src="js/bootstrap-button.js"></script>
    <script src="js/bootstrap-collapse.js"></script>
    <script src="js/bootstrap-carousel.js"></script>
    <script src="js/bootstrap-typeahead.js"></script>
  

            
</div>

</div>

</div>
 
</body>
</html>