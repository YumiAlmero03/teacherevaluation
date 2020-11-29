<?php
$to = "lanialmero@gmail.com";
$subject = "Arellano Teacher Evaluation results";
$name = "teacher";
$avg = 5;
$percent = 100;
$students = 5;
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
</table>
</body>
</html>
";

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: playeryumi@yahoo.com';

if (mail($to,$subject,$message,$headers)) {
	echo "yez";
} else {
	echo "error";
}
?>