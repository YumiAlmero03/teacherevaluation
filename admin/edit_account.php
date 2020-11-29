<?php
include ('connect.php');
include ('header.php');
$userID=mysqli_real_escape_string($con,$_GET['userID']);
?>

<br><br>
<body bgcolor="#80d4ff">

	<div id="page-inner">
	<div class="row">
		<div class="col-md- well" style=" margin-right:30%;margin-left:30%; box-shadow: 3px 4px 5px 2px; border-radius:8px;background-color:#cceeff">
			<div class="hero-unit-table">
				<div class="hero-unit-table">
					<?php

					$query = mysqli_query($con,"select * from td_admin where userID='$userID'") or die(mysqli_error());
					$row = mysqli_fetch_array($query);
					$nel = htmlentities($row['userID']);
					?>

					<form class="form-horizontal" method="post" enctype="multipart/form-data" >
						<div class="alert alert-info">
							<strong>Edit Account</strong> </div>

						<div class="control-group">
							<label class="control-label" for="inputPassword">Username</label>
							<div class="controls">
								<input type="text"  name="username"  class = "form-control" value="<?php echo strip_tags($row['username']); ?>">
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="inputPassword">Password</label>
							<div class="controls">
								<input type="text"  name="password"  class = "form-control" value="<?php echo strip_tags($row['password']); ?>">
							</div>
						</div>
						<br>

						<div class="control-group">
							<div class="controls">

								<button type="submit" name="update" class="btn btn-success">
									<i class="icon-save icon-large"></i>&nbsp;Update</button>
								<span>
									<a href = "home.php" class = "btn btn-danger"> Back</a></span>
							</div>
						</div>
					</form>

					<?php
					if (isset($_POST['update'])) {


						
						$username = mysqli_real_escape_string($con,$_POST['username']);
						$password = mysqli_real_escape_string($con,$_POST['password']);
						
						mysqli_query($con,"update td_admin set username='$username', password='$password' where userID='$userID'") or die(mysqli_query());

						echo "<script type='text/javascript'>alert('Successfully updated Account details!');</script>";
						echo "<script>document.location='home.php'</script>";
					}
					?>


				</div>



			</div>
			<!-- /. PAGE INNER  -->
		</div>
		<!-- /. PAGE WRAPPER  -->
	</div>

</body>
</html>
