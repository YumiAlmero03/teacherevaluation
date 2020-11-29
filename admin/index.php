
  
<?php
include('connect.php'); 

session_start();
if(isset($_SESSION['userID'])):
  header('Location:home.php');
endif;
?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>LOGIN</title>
  
  
      <link rel="stylesheet" href="css1/style.css">

  
</head>

<body>
<br><br><br><br><br><br><br><br><br><br><br>

<form method ="post" style="border-radius:6px;box-shadow:2px 2px 2px 2px;">
  <div class="hand"></div>
  <div class="hand rgt"></div>
  <h4><font color = "#990000"><img src ="../images/logo 123.png" height="80px" width="80px"><br>ADMIN SECURITY</font></h4>

  <div class="form-group">
    <input required="required"  name="username" class="form-control" required/>
    <label class="form-label">Username </label>
  </div>
  <div class="form-group">
    <input id="password" type="password" required="required" name="password" class="form-control" required/>
    <label class="form-label">Password</label>
   
    <button class="btn" name="login" id="go">Login </button>
  </div>
</form>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script  src="js1/index.js"></script>

    <?php //session_start();
     // session_destroy();

include('connect.php');

if(isset($_POST['login']))
{

$user_unsafe=$_POST['username'];
$pass_unsafe=$_POST['password'];

$user = mysqli_real_escape_string($con,$user_unsafe);
$pass1 = mysqli_real_escape_string($con,$pass_unsafe);
$pass=sha1($pass1);
$salt="a1Bz20ydqelm8m1wql";
$pass=$salt.$pass;

$query=mysqli_query($con,"select * from td_admin where username='$user' and password='$pass'")or die(mysqli_error($con));
    $row=mysqli_fetch_array($query);
           $id=$row['userID'];
           $counter=mysqli_num_rows($query);

        if ($counter == 0) 
        { 
          echo "<script type='text/javascript'>alert('Invalid Username or Password!');
          document.location='index.php'</script>";
        } 
        else
        {
          $_SESSION['userID']=$id; 
          /* $_SESSION['name']=$first." ".$last; */

          echo "<script type='text/javascript'>document.location='home.php'</script>";  
        }
}
?>

</body>
</html>
