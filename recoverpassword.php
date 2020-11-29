<div style="text-align:center; margin-top: 50px;">
<?php
include('connect.php');
$dsdas=mysqli_real_escape_string($con,$_POST['username']);
$ans=mysqli_real_escape_string($con,$_POST['username']);

$ako = mysqli_query($con,"SELECT * FROM register WHERE username= '$dsdas' AND username= '$ans'");
	while($row = mysqli_fetch_array($ako));
    $wapakpak = mysqli_num_rows($ako);

if ($wapakpak != 0) {
$dsdas=mysqli_real_escape_string($con,$_POST['username']);
$resultas = mysqli_query($con,"SELECT * FROM register WHERE username= '$dsdas'");
while($row = mysqli_fetch_array($resultas)){
$ako = htmlentities($row['password']);
echo '<span style="color: red;">Your Password is :</span><br>'.$ako.'
<br><br><br><p> Powered By Administration</p>';
} if ($wapakpak == 0) {
	echo '<div style="text-align:center; margin-top: 50px;"> Student ID No. Not Found
	<br>
	<p> if you think this is an error please Contact one of our admin or send an email to <br><br>admin@gmail.com</p>
	<br>
	Powered By Administration
	</div>';



?>
<?php } ?>
<?php } ?>
