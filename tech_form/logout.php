<?php session_start();
if(empty($_SESSION['username'])):
header('Location:index.php');
endif;
?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title></title>
  
  
  
      <link rel="stylesheet" href="../loading/css/style.css">

  
</head>

<body>
  <!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Loading Animation</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">
    </head>
    <body>

        <div class="circle"></div>
        <div class="circle-small"></div>
        <div class="circle-big"></div>
        <div class="circle-inner-inner"></div>
        <div class="circle-inner"></div>
    </body>
</html>
  
  
</body>
</html>
<body>
<div style="width:100%;text-align:center;vertical-align:bottom">
		<div class="loader"></div><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<?php

	session_destroy(); /*ito yung mag destroy ng ID na gamit mo sa paglogin at babalik sya don sa index.html mo na sya ring login*/
	
 echo '<meta http-equiv="refresh" content="2;url=../index.php">';
 
 echo'<span class="itext"><font color="red">Please waiting for loading!...</font></span>';
?>
</div>
</body>
</html>
