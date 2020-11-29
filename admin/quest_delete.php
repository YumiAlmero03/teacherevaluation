<?php
	include('connect.php');

	$id = $_GET['id'];

	$sql="delete from  questioner where id='$id'";

	$con->query($sql);

	header('location:eval_edit.php');
?>