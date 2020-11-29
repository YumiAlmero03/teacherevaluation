<?php

include "connect.php"; //open sql

function mailFaculty($faculty)
{
	include "connect.php";
	//email the faculty
	$from = "playeryumi@yahoo.com";
	//change this ^^^

	//get avg
	$prof_id = $faculty['id'];
	$getAVG = mysqli_query($con,"select AVG(answer) from evaluation where prof_id='$prof_id'") or die(mysqli_error());
    $avg = mysqli_fetch_array($getAVG);
    $ans = $avg['AVG(answer)'];

    $getCOUNT = mysqli_query($con,"select COUNT(id_teacher) from details where teacherid='$prof_id'") or die(mysqli_error());
    $count = mysqli_fetch_array($getCOUNT);
    $students = $count['COUNT(id_teacher)'];
   	if($ans >= 4.2 && $ans <= 5){
		$rate = 'Outstanding';
	}elseif($ans >= 3.4 && $ans <= 4.19){ /*dito naka base kung satisfy ba mga student sa mga prof*/
		$rate = 'Very satisfactory';
	}elseif($ans >= 2.6 && $ans <= 3.39){
		$rate = 'Satisfactory';
	}elseif($ans >= 1.8 && $ans <= 3.59){
		$rate = 'Unsatisfactory';
	}elseif($ans >= 1.0 && $ans <= 1.79){
		$rate = 'Poor';
	}elseif($ans >= 0 && $ans <= 0){
		$rate = 'Undefined';
	} else {
		$rate = "";
	}

	$to = $faculty['email'];	
	$name = $faculty['name'];
	$avg = round($ans, 2);
	$percent = ($avg/5)*100;
	$subject = "Arellano Teacher Evaluation results";
	$message = "
	<html>
	<head>
	<title>Teacher Evaluation results</title>
	</head>
	<body>
	<h1>Teacher Evaluation Results for: ".$name."</h1>
	<table>
	<tr>
	<th style='text-align:left'>AVG</th>
	<th style='text-align:left'>".$avg."</th>
	</tr>
	<tr>
	<th style='text-align:left'>Percent</th>
	<td style='text-align:left'>".$percent."%</td>
	</tr>
	<tr>
	<th style='text-align:left'>Students Evaluated</th>
	<td style='text-align:left'>".$students."</td>
	</tr>
	<tr>
	<th style='text-align:left'>Average Rating</th>
	<td style='text-align:left'>".$rate."</td>
	</tr>
	</table>
	</body>
	</html>
	";

	// Always set content-type when sending HTML email
	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

	// More headers
	$headers .= 'From: '.$from;
	mail($to,$subject,$message,$headers);
}

$teachers = mysqli_query($con,"SELECT * FROM professors ");
while($teacher = mysqli_fetch_array($teachers)){
	mailFaculty($teacher);
}