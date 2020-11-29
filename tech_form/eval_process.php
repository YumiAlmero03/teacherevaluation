 <?php


      $con = mysqli_connect('localhost', 'root', '', 'teacher_evaluation');
      /*echo "Connected successful!";*/
      if(mysqli_connect_errno()){
        echo "failed to connect database" .mysqli_connect_errno();
      }
  
   if (isset($_POST['evaluate'])) {
    $teacherid=$_POST['teacherid'];
    $studentid=$_POST['studentid'];
    $teacher=$_POST['teacher'];
    $fname=$_POST['fname'];
    $subject=$_POST['subject'];
    $semester=$_POST['semester'];
   $date=date("Y-m-d H:i:s");
    $sy= date("Y");
    $comment=$_POST['comment'];
    $rater=$_POST['rater'];
 mysqli_query($con,"INSERT INTO details (teacherid,teacher,studentid,fname,date,subject,semester,sy,comment,rater) VALUES ('$teacherid','$teacher','$studentid','$fname','$date','$subject','$semester','$sy','$comment','$rater')")or die(mysqli_error($con));

 foreach ($_POST['ans'] as $id => $value) {
    $getCat = mysqli_query($con,"select category_id from questioner where id='$id'") or die(mysqli_error());
    $quest = mysqli_fetch_array($getCat);
    $category_id = $quest['category_id'];
   mysqli_query($con,"INSERT INTO evaluation (`questioner_id`, `student_id`, `prof_id`, `answer`, `category_id`) VALUES ('$id','$studentid','$teacherid','$value','$category_id')")or die(mysqli_error($con));
 }
   echo "<script type='text/javascript'>alert('Successfully Submit Your Evaluation form!!!');document.location='index.php'</script>";

      }
    ?>