
<?php
include('connect.php'); 

session_start();
if(isset($_SESSION['StudentID'])):
  header('Location:tech_form/index.php');
endif;
?>
  <!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">


    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

<link rel="stylesheet" href="bootstrap/css/style.css">

<!-- Optional theme -->
<link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="bootstrap/js/bootstrap.min.js"></script>

    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="css_box/AdminLTE.min.css">
<style type="text/css">
	body{
		background-image: url('images/background1.jpg'); /*ito part na ito ay mismong background mo sa buong website na kulay blue na may design na may guhit guhit*/

	}

</style>
   
 </head>
<body>


		<nav class="navbar navbar-inverse" style="padding-top:0px;padding-bottom:80px" >
			<
			<h1 style="color:DodgerBlue;">Evaluation System</h1><img src="" style="margin-left:5%"> 
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#"></a>
    </div>
  </div>
   
                          
                        
</nav>

<br><br><br>
<!--<div class="" style="border:1px solid green;margin-left:30%;margin-right:30%;">-->
<div class="col-md-5 col-md-offset-4">
<div class="panel panel-info">
<div class="panel panel-title"><center style="border:1px solid green;background-color:#39ac39"><h2><b>Login Security</b></h2></center></div>
<div class="panel panel-body">
<div class="row">

   <div class="col-md-6 col-md-offset-3">
             
                  <!-- Date range -->
                 <form action="login_process.php" method="post">
                  <div id="form1">
					
				  
					 <div class="">
					
				        <div class="form-group">
							<label for="date">Username</label>	

              <!--mahalaga dito yung mga nasa name="username" kasi connected yan sa loob ng table data-->
								<input type="text" class="form-control input" name="username" placeholder="STUDENT ID NO" required>		
						  </div>
						  <div class="form-group">
							<label for="date">Password</label>
               <!--mahalaga dito yung mga nasa name="password" kasi connected yan sa loob ng table data-->		
								<input type="password" class="form-control input" name="password" placeholder="PASSWORD" required>		
						  </div>
						
            <p align="left">Forgot Password? Click <a href="#" onClick="MyWindow=window.open('pwordrecover.php','MyWindow','toolbar=no,location=no,directories=yes,status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=300,height=250'); return false;">Here</a></span></p>  <!--Ito yung sa forget password mo kapg kinalimutan mo password pang recover ito-->  
                  <div class="form-group">
                    
                      <input type ="submit" class="btn btn-primary btn-block"  name = "login" value="Login">
                        <!--mahalaga dito yung mga nasa name="login" kpg nagsubmit ka mag direct siya don sa login_process.php na makikita mudin don sa taas ng form action ="" ang link or target--> 
                 
                   </div>
                  </div>
               
				</form>	
       
                  
		</body>
		</html>