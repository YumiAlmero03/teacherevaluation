<?php
	require_once("functions/function.php");
	get_header();
	get_sidebar();
	get_bread_two();
?>
			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon white user"></i><span class="break"></span>Login Records.</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
						</div>
					</div>

					<div class="box-content">
					                <div class="block-content collapse in">
                                <div class="span12">
							<!--form action="delete_att.php" method="post"-->
  	<table cellpadding="0" cellspacing="0" border="0" class="table" id="example">
		<div class="pull-right">
	 
	 <!--a data-toggle="modal" href="#student_delete" id="delete"  class="btn btn-danger" name=""><i class="icon-trash icon-large"></i> Clear All</a-->
	</div>
	<div class="pull-right">
									<a href="#" onclick="window.print()" class="btn btn-info"><i class="icon-print icon-large"></i> Print / Export PDF</a> 
					</div>				
									
										<thead>
										  <tr>
										        <th>logId</th>
												<th>Username</th>
												<th>Date/login Checked</th>
												
												
												
										   </tr>
										</thead>
										<?php include('../connect.php'); ?>
										<tbody>
													<?php
													$userID = $_SESSION['StudentID'];

													$user_query = mysqli_query($con,"select * from user_log where userID = '$userID' order by user_log_id DESC")or die(mysql_error());
													while($row = mysqli_fetch_array($user_query)){
													$id = $row['user_log_id'];

													?>
												<tr>
												<td><?php echo $row['user_log_id']; ?></td>
												<td><?php echo $row['username']; ?></td>
												<td><?php echo $row['login_date']; ?></td>
												


												
												
												
												</tr>
												<?php } ?>
										</tbody>
									</table>
                                </div>
                            </div>
                        </div>
					</div>
				</div><!--/span-->
			
			</div><!--/row-->
<?php
	get_footer();
?>		

