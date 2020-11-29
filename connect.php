<?php 
$con = mysqli_connect('localhost', 'root', '', 'teacher_evaluation');
/*echo "Connected successful!";*/
if(mysqli_connect_errno()){
	echo "failed to connect database" .mysqli_connect_errno();
}
?>