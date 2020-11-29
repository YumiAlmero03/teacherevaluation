<?php
session_start();
if(empty($_SESSION['userID'])):
header('Location:index.php');
endif;
?>

<?php include ('header.php'); ?>

  <!-- Pie Chart-->
    <link rel="stylesheet" href="assets_pie/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets_pie/css/ilmudetil.css">
    <script src="assets_pie/js/highcharts.js"></script> 
    <script src="assets_pie/js/jquery-1.10.1.min.js"></script>

    <!-- endPie Chart-->
        <script>
        var chart; 
        $(document).ready(function() {
              chart = new Highcharts.Chart(
              {
                  
                 chart: {
                    renderTo: 'mygraph',
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false
                 },   
                 title: {
                    text: 'Teachers with Performance Statistics '
                 },
                 tooltip: {
                    formatter: function() {
                        return '<b>'+
                        this.point.name +'</b>: '+ Highcharts.numberFormat(this.percentage, 2) +' % ';
                    }
                 },
                 
                
                 plotOptions: {
                    pie: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        dataLabels: {
                            enabled: true,
                            color: '#000000',
                            connectorColor: 'green',
                            formatter: function() 
                            {
                                return '<b>' + this.point.name + '</b>: ' + Highcharts.numberFormat(this.percentage, 2) +' % ';
                            }
                        }
                    }
                 },
       
                    series: [{
                    type: 'pie',
                    name: 'Browser share',
                    data: [
                    <?php
                        include "connect.php";
                        
                          
                        $query = mysqli_query($con,"SELECT * FROM details order by teacherid DESC");/*ito ang eestimate kung ilang percent or kalaki ang performance ng isang Prof.*/
                     
                        while ($row = mysqli_fetch_array($query)) {
                            $icct = $row['teacherid'];


                            $data = mysqli_fetch_array(mysqli_query($con,"SELECT avetotal, count(*) as number FROM details  where teacherid='$icct'"));
                            $icct1 = $data['number'];
                          
                            /*ito ang eestimate kung ilang percent or kalaki ang performance ng isang Prof.*/

                            ?>
                            [ 
                                '<?php echo $icct ?>', <?php echo $icct1; ?>
                            ],
                            <?php
                        }
                        ?>
             

                    ]
                }]
              });
        }); 
    </script>


<body>
<?php include ('menunav.php'); ?>
<div class="container">
<div class="hero-unit-header">
<!--- body -->
<div class="container">
<div class="row-fluid">
<div class="span12">

  	  <!-- /. pieChart  -->

            <?php 
 
                        include "connect.php";
                        
                          
                        $query = mysqli_query($con,"SELECT SUM( avetotal ) AS total FROM details WHERE teacherid =  'Lumar Tipudan'");/*buong total nya ay pinag plus na lahat na nakuha sa bawat evaluate ng bawat student.*/
                     
                        while ($row = mysqli_fetch_array($query)) {
                         $avetotal = $row['total'];

                           $query1 = mysqli_query($con,"SELECT SUM( avetotal ) AS total FROM details WHERE teacherid =  'Roan Mae Leonen'");/*buong total nya ay pinag plus na lahat na nakuha sa bawat evaluate ng bawat student.*/
                     
                     
                        while ($row1 = mysqli_fetch_array($query1)) {
                         $avetotal1 = $row1['total'];

                             $query2 = mysqli_query($con,"SELECT SUM( avetotal ) AS total FROM details WHERE teacherid =  'Dagami Gliterio'");/*buong total nya ay pinag plus na lahat na nakuha sa bawat evaluate ng bawat student.*/
                     
                        while ($row2 = mysqli_fetch_array($query2)) {
                         $avetotal2 = $row2['total'];

                                 $query3 = mysqli_query($con,"SELECT SUM( avetotal ) AS total FROM details WHERE teacherid =  'Jeremiah Morales'");/*buong total nya ay pinag plus na lahat na nakuha sa bawat evaluate ng bawat student.*/
                     
                     
                        while ($row3 = mysqli_fetch_array($query3)) {
                         $avetotal3 = $row3['total'];

                          $query4 = mysqli_query($con,"SELECT SUM( avetotal ) AS total FROM details WHERE teacherid =  'Shara jane Saldino'");/*buong total nya ay pinag plus na lahat na nakuha sa bawat evaluate ng bawat student.*/
                     
                     
                        while ($row4 = mysqli_fetch_array($query4)) {
                         $avetotal4 = $row4['total'];
?>
				<div class="container" style="margin-top:20px">
                <div class="col-md-12">
                    <div class="panel panel-success">
                        <div class="panel-heading">The Graph are tracking Teacher's his/her Performance &copy;2020</div>
                            <div class="panel-body">
                                <div id ="mygraph"></div>
                                <div class="">
                                	<strong style="font-size: 1.4em"><i class="icon-signal">&nbsp;<font color="red">OverAll Total PerTeacher:</i></font></strong>&nbsp;&nbsp;&nbsp;&nbsp;<strong>Sir, Lumar Tipudan</strong>&nbsp;<span class="label label-success"><?php echo $avetotal; ?></span>&nbsp;&nbsp;&nbsp;&nbsp;<strong>Roan Mae Leonen</strong>&nbsp;<span class="label label-primary"><?php echo $avetotal1; ?></span>&nbsp;&nbsp;&nbsp;&nbsp;<strong>Dagami Gliterio</strong>&nbsp;<span class="label label-warning"><?php echo $avetotal2; ?></span>&nbsp;&nbsp;&nbsp;&nbsp;<strong>Jeremiah Morales</strong>&nbsp;<span class="label label-info"><?php echo $avetotal3; ?></span>&nbsp;&nbsp;&nbsp;&nbsp;<strong>Shara jane Saldino</strong>&nbsp;<span class="label label-danger"><?php echo $avetotal4; ?></span>
                                </div>
                                <div class="">
                                	<!--<p><i>He/She higher Total for evaluate by per student it is considered good performance.</i></p>-->
                                </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
            <?php } ?>	
             <?php } ?>
             <?php } ?>	
              <?php } ?>
              <?php } ?>	
          	   
					   
					   
					   
	 <!-- /. endpieChart  -->	
<div class="span12">
   <div class="hero-unit-3">
   
      <table style="width:1129px;" class="table table-bordered table-hover" id="example">
           <thead>
		     <tr>
			     <th>FullName</th>
			     <th>Teacher's Name</th>
			     <th>Subject</th>
			      <th>ave1</th>
			      <th>ave2</th>
			      <th>ave3</th>
			      <th>ave4</th>
			      <th>Average total</th>
			      <th>Rater</th>
			     
			     
			      
			      
			      
			      
			      
		     </tr>
           </thead>
		   <tbody>


			   
								
							

								<?php
								 include ('connect.php');

								$result3 = mysqli_query($con,"SELECT * FROM details where teacherid = 'Roan Mae Leonen' or teacherid = 'Lumar Tipudan' or teacherid = 'Dagami Gliterio' or teacherid = 'Jeremiah Morales' or teacherid = 'Shara jane Saldino'");
								
								
								while($teacher = mysqli_fetch_array($result3)){
							
								  ?>
								 <tr>
				
				<td><?php echo $teacher['fname']; ?></td>
				<td><?php echo $teacher['teacherid']; ?></td>
				<td><?php echo $teacher['subject']; ?></td>
				<td><?php echo $teacher['ave1']; ?></td>
				<td><?php echo $teacher['ave2']; ?></td>
				<td><?php echo $teacher['ave3']; ?></td>
				<td><?php echo $teacher['ave4']; ?></td>
				<td><?php echo $teacher['avetotal']; ?></td>
		
				<td>
										
				<?php
				if($teacher['avetotal'] != "")
				{
				$total = $teacher['avetotal'];
				if($total >= 4.2 && $total <= 5){
					echo 'Outstanding';
				}elseif($total >= 3.4 && $total <= 4.19){ /*dito naka base kung satisfy ba mga student sa mga prof*/
					echo 'Very satisfactory';
				}elseif($total >= 2.6 && $total <= 3.39){
					echo 'Satisfactory';
				}elseif($total >= 1.8 && $total <= 3.59){
					echo 'Unsatisfactory';
				}elseif($total >= 1.0 && $total <= 1.79){
					echo 'Poor';
				}elseif($total >= 0 && $total <= 0){
					echo 'Undefined';
				}
				}
				else
				{
				echo "Not Rated";
				}
				?>	
				</td>
							
									
									
								 </tr>
							<?php
					}
		
			  
			  ?>	



			</tr>
		   
		   </tbody>
      
      </table>
            
	
             	
</div>	
</div>	
	
	
	
	
	
	
	
</div>	
</div>

<?php include ('footer.php'); ?>	
</div>	
	
<?php include('modal.php'); ?>
</body>
</html>