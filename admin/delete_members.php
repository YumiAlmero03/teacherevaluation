<?php
	include('connect.php');

	$id = $_GET['userID'];

	$sql="delete from register where userID='$id'";

	$con->query($sql);

	header('location:student.php');
?>