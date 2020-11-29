<?php
	include('connect.php');

	$id = $_GET['userID'];

	$sql="delete from professors where id='$id'";

	$con->query($sql);

	header('location:faculty.php');
?>