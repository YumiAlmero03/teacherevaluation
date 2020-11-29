<?php
	include('connect.php');

	$id = $_GET['userID'];

	$sql="delete from class where id='$id'";

	$con->query($sql);

	header('location:class.php');
?>