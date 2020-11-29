<?php
	include('connect.php');

	$id = $_GET['id_teacher'];

	$sql="delete from  details where id_teacher='$id'";

	$con->query($sql);

	header('location:eval_Result.php');
?>