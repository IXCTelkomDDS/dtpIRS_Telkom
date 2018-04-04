<?php error_reporting(0) // tambahkan untuk menghilangkan notice ?>

<?php

	session_start();

	include "../header-admin.php";
	include "../koneksi_db.php";
	include "../check_session_admin.php";

?>


		<!-- chart -->
	  <script src="../js/jquery-1.10.1.min.js"></script>
	  <script src="../js/highcharts.js"></script>


	<title>Dashboard</title>
	

		<!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<!-- OVERVIEW -->
					<div class="panel panel-headline">
						<div class="panel-heading">
							<h3 class="panel-title">Lab. Participation Statistics</h3>
						</div>
						<div class="panel-body">
							
							<div class="row">
								<div class="col-md-12">
								
								<!--- Bagian Judul--> 
								  <div class="col-md-12">
								    <div class="panel panel-primary">
								      <div class="panel-heading">Count Statistic of Lab IRS</div>
								        <div class="panel-body">
								          <div id ="mygraph"></div>
								        </div>
								    </div>
								  </div>

								    <script>
								        var chart1; 
								        $(document).ready(function() {
								            chart1 = new Highcharts.Chart({
								            chart: {
								                renderTo: 'mygraph',
								                type: 'column'
								            },   
								       
								        title: {
								            text: '', 
								        },
								        
								        xAxis: {
								            categories: ['LAB IRS']
								        },
								        
								        yAxis: {
								            title: {
								            text: 'Number of Document'
								        }
								        },     
								        series:[

								        <?php 
								            include "../koneksi_db.php";

								            $sql   = "SELECT JENIS_LAB_UPLOAD, count(JENIS_FILE_UPLOAD) AS total FROM upload_dtp GROUP BY JENIS_LAB_UPLOAD";
								            $query = mysqli_query($connect, $sql);
								                while($temp = mysqli_fetch_array($query)) {
								                    $count_lab=$temp['JENIS_LAB_UPLOAD'];   
								                    $sql_total = "SELECT JENIS_LAB_UPLOAD, count(*) AS total FROM upload_dtp WHERE JENIS_LAB_UPLOAD='$count_lab'";        
								                    $query_total = mysqli_query($connect, $sql_total);
								                        while($data = mysqli_fetch_array($query_total)) {
								                           $total = $data['total'];                 
								                        }             

								        ?>

								        {

								            name: '<?php echo $count_lab; ?>',
								            data: [<?php echo $total; ?>]

								        },     

								        <?php 
								            }  
								        ?>      

								       ]
								      });
								     }); 

								    </script>
								</div>
								
							</div>
						</div>
					</div>
					<!-- END OVERVIEW -->
					
				</div>
			</div>
			<!-- END MAIN CONTENT -->
		</div>
		<!-- END MAIN -->



	<?php
		include "../footer-admin.php";
	?>
