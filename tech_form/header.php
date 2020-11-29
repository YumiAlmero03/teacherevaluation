
<?php 
include'connect.php';
session_start();
if(!isset($_SESSION['username'])){
	 header('location:../index.php');
}

?>

<!DOCTYPE html>
<html>
<head>
<title>Teacher's Evaluation system</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="screen">
<!--- <link href="css/1bootstrap.css" rel="stylesheet" type="text/css" media="screen"> -->
<link href="images/logo.png" rel="icon" type="image">
<link href="css/font-awesome.css" rel="stylesheet" type="text/css" media="screen">
<script src="js/jquery.js" type="text/javascript"></script>
<script src="js/bootstrap.js" type="text/javascript"></script>
<script src="js/jquery-1.7.2.min.js" type="text/javascript"></script>

<!---slider--->
    <link href="themes/5/js-image-slider.css" rel="stylesheet" type="text/css" />
    <script src="themes/5/js-image-slider.js" type="text/javascript"></script>
    <link href="generic.css" rel="stylesheet" type="text/css" />
<!---end slider-->	
		   <link href="css/datePicker.css" media="screen" rel="stylesheet" type="text/css" />

   <script type="text/javascript" src="js/jquery.datePicker.js"></script>


    <link href="tabmenu/tabmenu.css" rel="stylesheet" type="text/css" />
    <script src="tabmenu/tabmenu.js" type="text/javascript"></script>
   
</head>

  