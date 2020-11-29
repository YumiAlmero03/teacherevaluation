<?php
session_start();
if(empty($_SESSION['userID'])):
header('Location:index.php');
endif;
function getAVG($prof_id)
{
    include "connect.php";
    $getAVG = mysqli_query($con,"select AVG(answer) from evaluation where prof_id='$prof_id'") or die(mysqli_error());
    $avg = mysqli_fetch_array($getAVG);
    $ans = $avg['AVG(answer)'];
    return $ans;
}
?>

<?php include ('header.php'); ?>

  <!-- Pie Chart-->
    <link rel="stylesheet" href="assets_pie/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets_pie/css/ilmudetil.css">
    <script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
    <script src="assets_pie/js/jquery-1.10.1.min.js"></script>
<script>
        var chart; 
        $(document).ready(function() {
              Highcharts.chart('mygraph', {
              chart: {
                type: 'column'
              },
              title: {
                text: 'Faculty Ratings'
              },
              subtitle: {
                text: ''
              },
              xAxis: {
                categories: [
                   <?php 
                      include "connect.php";
                      $result3 = mysqli_query($con,"SELECT name FROM professors ");
                      while($prof = mysqli_fetch_array($result3)){
                        echo "'".$prof['name']."',";
                      }
                    ?>
                ],
                crosshair: true
              },
              yAxis: {
                min: 0,
                title: {
                  text: 'Average (avg)'
                }
              },
              tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                  '<td style="padding:0"><b>{point.y:.1f} avg</b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
              },
              plotOptions: {
                column: {
                  pointPadding: 0.2,
                  borderWidth: 0
                }
              },
              series: [
              <?php 
                include "connect.php";
                $categories = mysqli_query($con,"SELECT * FROM category ");
                while($category = mysqli_fetch_array($categories)){
                  $cat_id = $category['id'];
                  echo "{name: '".$category['name']."',";
                  echo "data: [";
                    $profs = mysqli_query($con,"SELECT * FROM professors");
                      while($prof = mysqli_fetch_array($profs)){
                        $prof_id = $prof['id'];
                        $getAVG = mysqli_query($con,"select AVG(answer) from evaluation where category_id='$cat_id' AND prof_id='$prof_id'") or die(mysqli_error());
                        $avg = mysqli_fetch_array($getAVG);
                        $ans = $avg['AVG(answer)'];
                        echo "".$ans.",";
                      }
                  echo "]},";
                }
                echo "{name: 'Total',";
                  echo "data: [";
                    $profs = mysqli_query($con,"SELECT * FROM professors");
                      while($prof = mysqli_fetch_array($profs)){
                        $prof_id = $prof['id'];
                        
                        echo getAVG($prof_id).",";
                      }
                  echo "]}";
              ?>
              ]
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
  <div class="span12" style="margin-top:30px"><div id ="mygraph"></div></div>
  
<div class="span12">
   <div class="hero-unit-3">
    <a href="email.faculty.php" data-toggle="modal" class="btn btn-inverse">Update Faculty</a>
<br>
      <table style="width:1129px;" class="table table-bordered table-hover" id="example">
           <thead>
    		     <tr>
    			     <th>Teacher's Name</th>
               <?php 
               //tinatawag lng list ng categories from db for header ng table
               $categories = mysqli_query($con,"SELECT name FROM category ");
               while($category = mysqli_fetch_array($categories)){
                  echo "<th>".$category['name']."</th>";
                }
                ?>
    			      <th>Average total</th>
    			      <th>Rate</th>
    		     </tr>
           </thead>
    		   <tbody>
							  <?php
  								include "connect.php";
  								$result3 = mysqli_query($con,"SELECT * FROM professors ");
  								while($teacher = mysqli_fetch_array($result3)){
                    //ililista lahat ng faculty as rows
							  ?>
							  <tr>
              			<td>
                      <?php 
                        //Faculty name
                        echo $teacher['name']; 
                      ?>
                    </td>
                    <?php 
                    //average per category
                     $categories = mysqli_query($con,"SELECT id FROM category ");
                     while($category = mysqli_fetch_array($categories)){
                        $cat_id = $category['id'];
                        echo "<td>";
                          $prof_id = $teacher['id'];
                          $getAVG = mysqli_query($con,"select AVG(answer) from evaluation where category_id='$cat_id' AND prof_id='$prof_id'") or die(mysqli_error());
                          $avg = mysqli_fetch_array($getAVG);
                          $ans = $avg['AVG(answer)'];
                          echo "".round($ans, 2)."";
                        echo "</td>";
                      }
                      ?>
              				<td><?php echo round(getAVG($teacher['id']), 2); ?></td>
              				<td>			
              				<?php
              				if(getAVG($teacher['id']) != "")
              				{
              				$total = getAVG($teacher['id']);
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
    		   </tbody>
      
      </table>
            
	
             	
</div>	
</div>	
	
	
	
	
	
	
	
</div>	
</div>

<?php include ('footer.php'); ?>	
</div>	
	
</body>
</html>