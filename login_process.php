
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title></title>
  
  
  
      <link rel="stylesheet" href="loading/css/style.css">

  
</head>

<body>
  <!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Loading Animation</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">
    </head>
    <body>

        <div class="circle"></div>  <!--itong part na ito ay para sa loading process-->
        <div class="circle-small"></div>
        <div class="circle-big"></div>
        <div class="circle-inner-inner"></div>
        <div class="circle-inner"></div>
    </body>
</html>
  
  
</body>
</html>
<body>
<div style="width:100%;text-align:center;vertical-align:bottom">
    <div class="loader"></div><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<?php
   session_start();/*ito session na ito ay para masala nya yung bawat ID ng bawat member na nagllogin at nag seperate kay ADMIN AT USER kasi kapg wala ito baka bawat naglogin puro kay user nppunta*/

  session_destroy();/*itong part na ito ay ginamit sa logout para ma destroy nya yung ID na gamit mo sa paglogin*/
  
 echo '<meta http-equiv="refresh" content="2;url=tech_form/evaluation.php">';
 
 echo'<span class="itext"><font color="red">Please waiting for loading!...</font></span>';
?>
</div>
</body>
</html> <!--End ng part ng loading process-->





<?php session_start();

include('connect.php');/* itong part na ito ay ini include lang natin ang connection ng database na nakabukod ng ibang form like 
'connect.php' kung wala ito maaaring d ka makaconnect sa database mo at lalo sa mga table, ito kasi ang nag-control*/

if(isset($_POST['login']))
{

$user_unsafe=$_POST['username'];  /*kapag naka kita ka ng ganitong symbol "$" ibig sabihin nyan ay variable or gumamit ka ng variable*/
$pass_unsafe=$_POST['password'];




$username = mysqli_real_escape_string($con,$user_unsafe);
$pass1 = mysqli_real_escape_string($con,$pass_unsafe);


date_default_timezone_set('Asia/Manila');/*itong part na ito ay saktong oras at date sa ating bansa*/
$date = date("Y-m-d H:i:s");/*itong part na ito ay saktong oras at date  sa ating bansa*/


$query=mysqli_query($con,"select * from register where username='$username' and password='$pass1'")or die(mysqli_error($con));
/*yang register na nasa loob na nkita n'yo ,yan ang table at yung username at password yan yung nasa loob ng table na naka ROW*/

    $row=mysqli_fetch_array($query);/*itong mysqli_fetch_array ito yung tagahanap ng data sa loob ng table na tinatype mo kung match*/
           $id=htmlentities($row['userID']);
           $username=htmlentities($row['username']);
           $fname=htmlentities($row['fname']);
     
           $counter=mysqli_num_rows($query); /*hahanapin nito yung data na match don sa naka hanay lang sa part ng mga naka ROW*/

        if ($counter == 0) /*kung wala s'yang makikita sa loob ng table na kahit isa na match sa hinahanap nya magkakaroon ng error at babalik lang sa login*/
        { 
          echo "<script type='text/javascript'>alert('Please check your Student No. and Password!');document.location='index.php'</script>";
        } 
        else
        {
          
      $_SESSION['StudentID']=$id; 
       $_SESSION['fname']=$fname; 
      $_SESSION['username']=$username; 

    

    $remarks="has logged in the system at ";  /*itong part na ito ay malalaman natin kung sino ang naglologin at automatic masasave siya sa database table na ma-view rin ni admin*/
    mysqli_query($con,"INSERT INTO history_log(userID,action,date) VALUES('$id','$remarks','$date')")or die(mysqli_error($con));
    /*end para sa view ng login*/

          echo "<script type='text/javascript'>document.location='tech_form/index.php'</script>";  
          /*Pero kapang may makikita s'ya sa loob ng table na kahit isa na match sa hinahanap nya ppunta s'ya sa target form*/
        }
}
?>