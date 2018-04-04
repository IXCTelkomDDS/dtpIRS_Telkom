<?php error_reporting(0) // tambahkan untuk menghilangkan notice ?>

<?php

	session_start();

	include "../header-pic.php";
	include "../pagination1.php";
	include "../check_session.php";


?>


		<title>Lab. Participation Statistics</title>

		<!-- chart -->
		<script src="../js/jquery-1.10.1.min.js"></script>
		<script src="../js/highcharts.js"></script>


<body class="no-trans">
		<!-- scrollToTop -->
		<!-- ================ -->
		<div class="scrollToTop"><i class="icon-up-open-big"></i></div>

		<!-- header start -->
		<!-- ================ --> 
		<header class="header navbar navbar-fixed-top" style="background-color: #D3D3D3; height: 100px;">
			<div class="container">
				<div class="row">
					<div class="col-md-2">

						<!-- header-left start -->
						<!-- ================ -->
						<div class="header-left clearfix">

							<!-- logo -->
							<div class="logo smooth-scroll">
								<a href="index.php"><img id="logo" src="../images/DDS-telkom.png" width="60" alt="Worthy"></a>
							</div>

						</div>
						<!-- header-left end -->

					</div>
					<div class="col-md-10">

						<!-- header-right start -->
						<!-- ================ -->
						<div class="header-right clearfix">

							<!-- main-navigation start -->
							<!-- ================ -->
							<div class="main-navigation animated">

								<!-- navbar start -->
								<!-- ================ -->
								<nav class="navbar navbar-default" role="navigation">

										<!-- Collect the nav links, forms, and other content for toggling -->
										<div class="collapse navbar-collapse scrollspy smooth-scroll" id="navbar-collapse-1">
											<ul class="nav navbar-nav navbar-left">
												<li><a href="index.php" style="font-weight: bold;">Home</a></li>
												<li><a href="research-result.php" style="font-weight: bold;">Research Result</a></li>
												<li><a href="#chart" style="font-weight: bold;">Statistics Lab IRS</a></li>
												<li><a href="prototype.php" style="font-weight: bold;">Prototype</a></li>
												<li><a href="#contact" style="font-weight: bold;">Contact Us</a></li>
											</ul>

											<ul class="nav navbar-nav navbar-right">
												<!-- logo -->
												<div class="logo smooth-scroll">
													<a href="index.php"><img id="logo" src="../images/logo-telkom.png" width="90" alt="Worthy"></a>
												</div>
											</ul>
										</div>

									</div>
								</nav>
								<!-- navbar end -->

							</div>
							<!-- main-navigation end -->

						</div>
						<!-- header-right end -->

					</div>
				</div>
			</div>
		</header>
		<!-- header end -->

		<div class="space"></div>

		<!-- section start -->
		<!-- ================ -->
		<div class="section clearfix object-non-visible" data-animation-effect="fadeIn" style="background-color: white;">
			<div align="center" class="container">
				<div class="row">

					<div align="center" class="col-md-12">
						<h1 id="chart" class="title text-center" style="font-weight: bold; margin-top: 30px;">Lab. Participation Statistics</h1>

					<div align="center" class="col-md-9" style="margin-left: 200px;">
						<h4>This page is a statistics to determine how active each existing lab at the IRS to upload a review, standardization document and prototype</h4>   
					</div>

						<br>
						<br>
						<br>
						<br>

				      <!--- Bagian Judul--> 
				  <div class="col-md-8" style="margin-left: 200px;">
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
		</div>
		<!-- section end -->		


<?php
	include "../footer-pic.php";
?>