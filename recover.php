
<?php
include('connect.php');

$dsdsss=mysqli_real_escape_string($con,$_POST['username']);

$ako = mysqli_query($con,"SELECT * FROM register WHERE username= '$dsdsss'");
while($row = mysqli_fetch_array($ako));
$wapakpak = mysqli_num_rows($ako);

if ($wapakpak != 0) {
$dsdas=mysqli_real_escape_string($con,$_POST['username']);
$resultas = mysqli_query($con,"SELECT * FROM register WHERE username= '$dsdas'");
while($row = mysqli_fetch_array($resultas));
$ako = htmlentities($row['username']);

echo ''.$ako.'
<center>
<form action="recoverpassword.php" method="POST">
<span style="color: #000000;">Student ID/No. Confirmation</span><br><br><br>
<input type="hidden" name="username" value="'.$ako.'" /><input type="text" name="username" placeholder="Confirmat Student ID" value="" required/><br><br>
<input style ="background-color:#b3ff66" type="submit" value="Next" />
<input style ="background-color:red" type="reset" value="reset" />
<br /><br /><br /><br />
<p>Powered By Administration</p>
</form>';
}

if ($wapakpak == 0) {
	echo '<div style="text-align:center; margin-top: 50px;"> Student ID No. Not Found
	<br>
	<p> if you think this is an error please Contact one of our admin or send an email to <br><br>admin@gmail.com</p>
	<br>
	Powered By Administration
	</div>';


}
?>

