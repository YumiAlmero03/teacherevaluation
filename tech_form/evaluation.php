
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
   $classid = $_GET['classid'];
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
<br><br>
<!--end-->
<!-- sidebar -->
<div id="sidebar" style=" position: fixed;right: 0;width: 25%;">
  <h4>PERFORMANCE EVALUATION INSTRUMENT</h4>
  <table class="table table-hover">
    <tr>
      <th>Scale</th>
      <th>Description</th>
    </tr>
    <tr>
      <td>5</td>
      <td>
        <b>Outstanding</b>
        <br>The performance always exceeds the job requirements. The student is exceptional role model.
      </td>
    </tr>
    <tr>
      <td>4</td>
      <td>
        <b>Very Satisfactory</b>
        <br>The performance meets and often exceeds the job requirements.
      </td>
    </tr>
    <tr>
      <td>3</td>
      <td>
        <b>Satisfactory</b>
        <br>The performance meets job requirements.
      </td>
    </tr>
    <tr>
      <td>2</td>
      <td>
        <b>Fair</b>
        <br>The performance needs some development to meet job requirements.
      </td>
    </tr>
    <tr>
      <td>1</td>
      <td>
        <b>Poor</b>
        <br>The student fails to meet job requirements.
      </td>
    </tr>
  </table>
</div>
  <!--functions-->          
<div id="content main" style="width: 75%">    
 
        
    <!--endfunctions-->

<div class="row-fluid">
<div class="span12">
<div class="hero-unit" style="background-color:#ffffe6">
<legend><h4 style="margin-left:350px;">EVALUATION FORM</h4></legend>
<form action="eval_process.php" method="POST">
  <?php 
  $classQ = mysqli_query($con,"select * from class where id='$classid'") or die(mysqli_error());
  $class = mysqli_fetch_array($classQ);
  $profid = $class['prof_id'];
  $profQ = mysqli_query($con,"select * from professors where id='$profid'") or die(mysqli_error());
  $prof = mysqli_fetch_array($profQ);
  $userQ = mysqli_query($con,"select * from register where userID = '$userID'") or die(mysqli_error());
  $user = mysqli_fetch_array($userQ);
 ?>
  <input type="hidden" name="teacherid" value="<?php echo $profid; ?>">
  <input type="hidden" name="teacher" value="<?php echo $prof['name']; ?>">
  <input type="hidden" name="studentid" value="<?php echo $userID; ?>">
  <input type="hidden" name="fname" value="<?php echo $user['fname']; ?>">
  <input type="hidden" name="subject" value="<?php echo $class['class_code']; ?>">
  <input type="hidden" name="semester" value="<?php echo $user['semester']; ?>">
  <input type="hidden" name="rater" value="student">
 
   <!--table2-->

  <table width="800" class="table table-bordered table-hover">

 <?php

      $con = mysqli_connect('localhost', 'root', '', 'teacher_evaluation');
      /*echo "Connected successful!";*/
      if(mysqli_connect_errno()){
        echo "failed to connect database" .mysqli_connect_errno();
      }
   //session_start();

   $userID = $_SESSION['StudentID']; /*kaya may session dito para malaman natin sino yung naglogin na magkakaiba ng account or sarili nyang account lang makikita nya*/

   $query=mysqli_query($con,"select * from category")or die(mysqli_error($con));
    while($row=mysqli_fetch_array($query)){
      
?> 
  <thead>
      <th class="alert alert-info"><center><strong><font color="#2B547E"><?php echo $row['name']; ?></th>
      <th class="alert alert-info"><center><strong><font color="#2B547E">Scale</th>
  </thead>

  <?php
    $catID = $row['id'];
    $questions=mysqli_query($con,"select * from questioner where category_id='$catID'")or die(mysqli_error($con));
    while($quest=mysqli_fetch_array($questions)){
      ?>
        <tr>
          <td><?php echo $quest['question']; ?> </td>
          <td width = "190">
          
          <label class="radio inline">
            <input type="radio" name="ans[<?php echo $quest['id']; ?>]" id="q<?php echo $quest['id']; ?>inlineoptionsRadios1" class="first" value="1" required>1
            </label>                                                 
          <label class="radio inline">                               
            <input type="radio" name="ans[<?php echo $quest['id']; ?>]" id="q<?php echo $quest['id']; ?>inlineoptionsRadios2" class="first" value="2" required>2
            </label>                                                 
           <label class="radio inline">                              
            <input type="radio" name="ans[<?php echo $quest['id']; ?>]" id="q<?php echo $quest['id']; ?>inlineoptionsRadios3" class="first" value="3" required>3
            </label>                                                 
           <label class="radio inline">                              
            <input type="radio" name="ans[<?php echo $quest['id']; ?>]" id="q<?php echo $quest['id']; ?>inlineoptionsRadios4" class="first" value="4" required>4
            </label>                                                 
          <label class="radio inline">                               
            <input type="radio" name="ans[<?php echo $quest['id']; ?>]" id="q<?php echo $quest['id']; ?>inlineoptionsRadios5" class="first" value="5" required>5
            </label>
          </td>
        </tr>
      
  <?php  }  ?><!--commitment-->
<?php  }  ?><!--commitment-->
      
         <!--end-->  
   </table>
    <label>Leave a Comment:</label><textarea  rows="20" placeholder="leave a comment here..." class="span11" name="comment" style=" height:134px;"></textarea>
  <br>
    <input type="submit" name="evaluate" class="btn btn-primary btn-large" value="SUBMIT">

   <!--mahalaga yang name="evaluate" kasi lahat ng ininput mujan ibabato nya yung data para masave sa table ppunta s'ya don sa eval_process.php ito ang magssave ng lhat ng data mo nailagay mo sa field-->
  
      </form>   
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
  


  <script type="text/javascript">
  jQuery(document).ready( function($){  /*ito yung nag cocompute na bawat na select mo don sa 1-5*/
    $(".first").change(function(){
      recalculate($(this).attr('class'),5);
    });
    $(".second").change(function(){
      recalculate($(this).attr('class'),5);
    });
    $(".third").change(function(){
      recalculate($(this).attr('class'),5);
    });
    $(".fourth").change(function(){
      recalculate($(this).attr('class'),5);
    });
    
    function recalculate(classVar,dividend){
      var sum = 0;
      $("."+classVar+":checked").each(function(){
        sum += parseInt($(this).val());
      });
      console.log(sum);
      sum = sum / dividend;
      $("#"+classVar).val(sum.toFixed(2));
      
      var total = 0;

      $(".totalClass").each(function(){
        var val = parseInt($(this).val());
        total += val;
      });
      total = (total / 5);
      $("#avetotal").val(total.toFixed(2));
      
      
    }
  });
  </script>


 

                           <script>
                // <!--/. tells about the time  -->
                              function show2(){
                              if (!document.all&&!document.getElementById)
                              return
                              thelement=document.getElementById? document.getElementById("tick2"): document.all.tick2
                              var Digital=new Date()
                              var hours=Digital.getHours()
                              var minutes=Digital.getMinutes()
                              var seconds=Digital.getSeconds()
                              var dn="PM"
                              if (hours<12)
                              dn="AM"
                              if (hours>12)
                              hours=hours-12
                              if (hours==0)
                              hours=12
                              if (minutes<=9)
                              minutes="0"+minutes
                              if (seconds<=9)
                              seconds="0"+seconds
                              var ctime=hours+":"+minutes+":"+seconds+" "+dn
                              thelement.innerHTML=ctime
                              setTimeout("show2()",1000)
                              }
                              window.onload=show2
                      //-->
                       
                        </script> <!--/. Script where the format of the interface time,month,day and year relies -->
            
</div>

</div>

</div>
 
</body>
</html>