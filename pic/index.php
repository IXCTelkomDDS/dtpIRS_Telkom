<?php error_reporting(0) // tambahkan untuk menghilangkan notice ?>

<?php

	session_start();

	include "../header-pic-home.php";
	include "../koneksi_db.php";
	include "../check_session.php";

	$no = 1;
	$sql_pic = "SELECT * FROM user_pic WHERE user_type = 'User P.I.C' ORDER BY id_pic ASC";
	$result_pic = mysqli_query($connect, $sql_pic);

?>

			<!-- chart -->
		<script src="../js/jquery-1.10.1.min.js"></script>
		<script src="../js/highcharts.js"></script>


		<title>Kajian IV DTP IRS</title>


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
								<a href="#banner"><img id="logo" src="../images/DDS-telkom.png" width="60" alt="Worthy"></a>
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
											<ul class="nav navbar-nav navbar-left" style="padding-left: 43px;">
												<li><a href="#banner" style="font-weight: bold;">Home</a></li>
												<li><a href="research-result.php" style="font-weight: bold;">Research Result</a></li>
												<li><a href="upload_submission.php" style="font-weight: bold;">Doc. Submission</a></li>
												<li><a href="prototype.php" style="font-weight: bold;">Prototype</a></li>
											</ul>

											<ul class="nav navbar-nav navbar-right">
												<!-- logo -->
												<div class="logo smooth-scroll">
													<a href="index.php"><img id="logo" src="../images/logo-telkom.png" width="90" alt="Worthy"></a>
												</div>

											</ul>
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

		<!-- section start -->
		<!-- ================ -->
		<div id="banner" class="section clearfix object-non-visible" data-animation-effect="fadeIn" style="background-color: white; margin-top: 55px; height: 300px;">
			<div class="container">
				<div class="row">
					<div class="col-md-12">

						<div class="col-md-12 media-body text-left">
							<h4>Welcome to, <a href="" data-toggle="modal" data-target="#myModal2" onclick="showDetails2(this);"><?php echo $_SESSION['username'];?></a> | <a href="../act_logout_pic.php">Logout</a></h4>			
						</div>

						<!-- displaying pop up that will show details -->
						<!-- modal -->
						<div class="modal fade" id="myModal2" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
						    <div class="modal-dialog">
						        <div class="modal-content">
						            <div class="modal-header">
						                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						                <h4 class="modal-title" id="myModalLabel2">Profile of User P.I.C</h4>
						            </div>

								<div class="modal-body">
								    <!-- display data in pop up -->

								    <?php while($data_pic = mysqli_fetch_array($result_pic)) { ?>

								    <?php if($data_pic['username'] == $_SESSION['username']) { ?>

								    <br>

								    <p align="center">Name       : <?php echo $data_pic['name_pic'];?></p>
								    <p align="center">Phone      : <?php echo $data_pic['phone'];?></p>
								    <p align="center">Email      : <?php echo $data_pic['email'];?></p>
								    <p align="center">Lab P.I.C  : <?php echo $data_pic['lab_pic'];?></p>	

								    <br>

								    <div class="text-center"><a href="update_user_pic.php?id=<?php echo $data_pic['id_pic'];?>" class="btn btn-primary">Edit Profile</a></div>

								    <?php } ?>

								    <?php } ?>

						        </div>

						   		</div>
						    </div>
						</div>
						<!-- End Modal -->



						<title>Lab. Participation Statistics</title>

		
					<div align="center" class="col-md-12">
						<h1 id="chart" class="title text-center" style="font-weight: bold; margin-top: 30px;">Lab. Participation Statistics</h1>

					<div align="center" class="col-md-9" style="margin-left: 200px;">
						<h4>This page is a statistics to determine how active each existing lab at the IRS to upload a review, standardization document and prototype</h4>   
					</div>

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


<!-- pop up details -->
<script type="text/javascript">
    function showDetails2(button) {
        $.ajax({
            success: function(response) {
            }
        });
    }
</script>